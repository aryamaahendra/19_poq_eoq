<?php

namespace App\Actions;

use App\Models\Algorithm;
use App\Models\Component;
use App\Models\OrderItem;
use App\Models\SellItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class Metode
{
    public static function proses($components, $dates, $maxof)
    {
        if (count($dates) != $maxof) abort(400);
        Cache::forget('order_dates');

        foreach ($components as $component) {
            $H = (int) $component->holding_cost_unit; // persentase biaya penyimpanan barang
            $S = (int) $component->order_cost; // biaya pemesanan yang diperlukan

            // total penjualan
            $sumOfSell = SellItem::where('component_id', $component->id)->sum('qty');
            $D = $sumOfSell / 3; // kebutuhan rata2 per priode

            $EOQ = 2 * $D * $S / $H;
            $EOQ = ceil(sqrt($EOQ));
            $OrderingFrequency = 0;
            $POQ = 0;
            $ROP = 0;

            if ($sumOfSell > 0 && $D > 0) {
                $OrderingFrequency = ceil($EOQ / $D);
                if ($OrderingFrequency > $maxof) {
                    $OrderingFrequency = $maxof;
                }

                $POQ = ceil($EOQ /  $OrderingFrequency);

                $safetyStock = ceil(($sumOfSell / 90) * 3);
                $ROP = ceil($D) + $safetyStock;
            }

            // dd('EOQ: ' . $EOQ . '; POQ: ' . $POQ . '; ROP: ' . $ROP);


            Algorithm::updateOrCreate(
                [
                    'component_id' => $component->id,
                ],
                [
                    'POQ' => $POQ,
                    'EOQ' => $EOQ,
                    'ROP' => $ROP,
                    'order_frequency' => $OrderingFrequency,
                ]
            );
        }

        Cache::rememberForever('order_dates', fn () => ['maxof' => $maxof, 'dates' => $dates]);
    }

    public static function recommendedOrder()
    {
        $orderDates = Cache::get('order_dates');
        $exist = [];
        $components = new Collection();

        $temps = Component::with(['algorithm', 'category'])
            ->whereHas(
                'algorithm',
                fn (Builder $q) => $q->whereRaw('algorithm.ROP >= components.in_stock')
                    ->where('EOQ', '>', 0)
            )->get();

        $currComponents = $temps->pluck('id')->toArray();
        Metode::filterComponent($components, $temps, Metode::getCounts($currComponents));
        array_push($exist, ...$components->pluck('id'));

        $orderNow = array_search(Carbon::now()->day, $orderDates['dates']);
        if ($orderNow) {
            $orderFrequency = $orderNow + 1;
            $temps = Component::with(['algorithm', 'category'])
                ->whereHas(
                    'algorithm',
                    fn (Builder $q) => $q->where('order_frequency', $orderFrequency)
                        ->where('EOQ', '>', 0)
                )->whereNotIn('id', $exist)->get();

            $currComponents = $temps->pluck('id')->toArray();
            Metode::filterComponent($components, $temps, Metode::getCounts($currComponents));
        }

        return $components;
    }

    private static function getCounts(array $in)
    {
        return OrderItem::selectRaw(
            'COUNT(id) as count, component_id'
        )->whereHas(
            'order',
            fn (Builder $q) =>
            $q->whereMonth('date', now()->month)->whereYear('date', now()->year)
        )->whereIn('component_id', $in)->groupBy('component_id')->get()->toArray();
    }

    private static function filterComponent(&$components, $temps, $counts): void
    {
        foreach ($temps as $temp) {
            $first = Arr::first($counts, fn ($val, $key) => $val['component_id'] == $temp->id);
            if (!$first) {
                $components->push($temp);
                continue;
            }

            if ($first['count'] < $temp->algorithm->order_frequency) {
                $components->push($temp);
            }
        }
    }
}
