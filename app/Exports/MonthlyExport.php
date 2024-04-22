<?php

namespace App\Exports;

use App\Models\Component;
use App\Models\ComponentCategory;
use App\Models\OrderItem;
use App\Models\SellItem;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Illuminate\Support\Str;

class MonthlyExport implements FromCollection, WithEvents
{
    public function __construct(
        protected int $month,
        protected int $year
    ) {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect([]);
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $endColl = 68;
                $date = Carbon::create($this->year, $this->month);

                // Carbon::now()->translatedFormat('j F Y')
                $sheet->setCellValue('A1', 'DAFTAR STOCK ');
                $sheet->mergeCells([1, 1, $endColl, 1]);

                $sheet->setCellValue('A2', 'SERVICE STATION');
                $sheet->mergeCells([1, 2, $endColl, 2]);

                $sheet->setCellValue('A3', Str::upper($date->monthName) . ' ' . $date->year);
                $sheet->mergeCells([1, 3, $endColl, 3]);

                $sheet->getStyle([1, 1, $endColl, 3])->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // TABLE HEADERS
                $sheet->setCellValue('A5', 'No.');
                $sheet->mergeCells('A5:A6');

                $sheet->setCellValue('B5', 'Jenis Sperepart');
                $sheet->mergeCells('B5:B6');

                $sheet->setCellValue('C5', 'Stock Bulan Lalu');
                $sheet->mergeCells('C5:C6');

                $sheet->setCellValue('D5', 'Pembelian 1-31');
                $sheet->mergeCells([4, 5, 4 + 30, 5]);

                for ($i = 0; $i < 31; $i++) {
                    $sheet->setCellValue([4 + $i, 6, 4 + $i, 6], $i + 1);
                }

                $sheet->setCellValue([35, 5], 'Pembelian');
                $sheet->mergeCells([35, 5, 35, 6]);

                $sheet->setCellValue([36, 5], 'Penjualan 1-31');
                $sheet->mergeCells([36, 5, 36 + 30, 5]);

                for ($i = 0; $i < 31; $i++) {
                    $sheet->setCellValue([36 + $i, 6, 36 + $i, 6], $i + 1);
                }

                $sheet->setCellValue([67, 5], 'Penjualan');
                $sheet->mergeCells([67, 5, 67, 6]);

                $sheet->setCellValue([68, 5], 'Sisa Stock');
                $sheet->mergeCells([68, 5, 68, 6]);

                $sheet->getStyle([1, 5, $endColl, 6])->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true
                    ],
                ]);

                $categories = ComponentCategory::all();
                $workingRow = 7;

                foreach ($categories as $category) {
                    $sheet->setCellValue([1, $workingRow], '##');
                    $sheet->setCellValue([2, $workingRow], Str::upper($category->name));
                    $sheet->getStyle([1, $workingRow, 68, $workingRow])->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'FFA0A0A0',
                            ],
                        ],
                    ]);

                    $workingRow++;

                    $count = 1;
                    $sumQty = 0;
                    $sumTotalPrice = 0;
                    $first = true;

                    $components = Component::where('category_id', $category->id)
                        ->orderBy('id', 'asc')->get();

                    foreach ($components as $component) {
                        $sheet->setCellValue([1, $workingRow], $count);
                        $sheet->setCellValue([2, $workingRow], Str::title($component->name));
                        $sheet->setCellValue([3, $workingRow], '-');

                        $sumQty = 0;
                        for ($i = 0; $i < 31; $i++) {
                            $currDate = Carbon::create($this->year, $this->month, $i + 1);

                            $qty = OrderItem::where('component_id', $component->id)
                                ->whereHas(
                                    'order',
                                    fn ($query) => $query->whereDate('date', $currDate)
                                )->sum('qty');

                            $sumQty += $qty;
                            $sheet->setCellValue([4 + $i, $workingRow], $qty <= 0 ? '' : $qty);
                        }

                        $sheet->setCellValue([35, $workingRow], $sumQty <= 0 ? '-' : $sumQty);

                        $sumQty = 0;
                        for ($i = 0; $i < 31; $i++) {
                            $currDate = Carbon::create($this->year, $this->month, $i + 1);

                            $qty = SellItem::where('component_id', $component->id)
                                ->whereHas(
                                    'sell',
                                    fn ($query) => $query->whereDate('date', $currDate)
                                )->sum('qty');

                            $sumQty += $qty;
                            $sheet->setCellValue([36 + $i, $workingRow], $qty <= 0 ? '' : $qty);
                        }

                        $sheet->setCellValue([67, $workingRow], $sumQty <= 0 ? '-' : $sumQty);
                        $sheet->setCellValue([68, $workingRow], '-');

                        $workingRow++;
                        $count++;
                    }

                    $workingRow++;
                }

                $this->number = $workingRow - 2;
            },
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                // $header = $this->getTabelHeader();
                // $endColl = count($header);

                $sheet->getColumnDimensionByColumn(1)->setWidth(50, 'px');
                $sheet->getColumnDimensionByColumn(2)->setWidth(250, 'px');
                $sheet->getColumnDimensionByColumn(3)->setWidth(80, 'px');

                for ($i = 0; $i < 31; $i++) {
                    $sheet->getColumnDimensionByColumn(4 + $i)->setWidth(50, 'px');
                }

                $sheet->getColumnDimensionByColumn(35)->setWidth(80, 'px');

                for ($i = 0; $i < 31; $i++) {
                    $sheet->getColumnDimensionByColumn(36 + $i)->setWidth(50, 'px');
                }

                $sheet->getColumnDimensionByColumn(67)->setWidth(80, 'px');
                $sheet->getColumnDimensionByColumn(68)->setWidth(80, 'px');

                $sheet->getStyle([1, 5, 68, $this->number])->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ]);
            }
        ];
    }
}
