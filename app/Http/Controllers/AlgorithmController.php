<?php

namespace App\Http\Controllers;

use App\Actions\Algorithm\DTAlgorithm;
use App\Models\Algorithm;
use App\Models\Component;
use App\Models\Sell;
use App\Models\SellItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AlgorithmController extends Controller
{
    public function index(): View
    {
        $data = Cache::get('order_dates', null);
        return view('algorithm.index', compact('data'));
    }

    public function data(DTAlgorithm $dt): JsonResponse
    {
        return response()->json($dt->json());
    }

    public function proses(Request $request)
    {
        $components = Component::all();
        $maxof = (int) $request->input('maxof');

        $dates = explode(',', $request->input('order_date'));
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

        return redirect()->route('dshb.algoritm.index');
    }
}
