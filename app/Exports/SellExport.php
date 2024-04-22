<?php

namespace App\Exports;

use App\Models\ComponentCategory;
use App\Models\Sell;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class SellExport implements FromCollection, WithEvents
{
    protected $sell = null;
    protected $number = 0;

    public function __construct()
    {
        $this->sell = request()->route('m_sell');
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
                $endColl = 7;

                // Carbon::now()->translatedFormat('j F Y')
                $sheet->setCellValue('A1', 'SERVICE STATION ');
                $sheet->setCellValue('A2', 'JLN. MAGULILI TIPO KOTA PALU ');

                $sheet->getStyle([1, 1, $endColl, 2])->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $sheet->mergeCells([1, 1, $endColl, 1]);
                $sheet->mergeCells([1, 2, $endColl, 2]);

                $sheet->setCellValue('A4', 'Nota Penjualan');
                $sheet->mergeCells([1, 4, $endColl, 4]);

                $sheet->setCellValue('A5', 'Nomor Nota: ' . $this->sell->no);
                $sheet->mergeCells([1, 5, $endColl, 5]);

                $sheet->getStyle([1, 4, $endColl, 5])->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ]
                ]);

                $sheet->setCellValue('A7', 'No Kendaraan: ' . $this->sell->vehicle_number);
                $sheet->mergeCells([1, 7, $endColl, 7]);

                $sheet->setCellValue('A8', 'Nama Supir: ' . $this->sell->driver_name);
                $sheet->mergeCells([1, 8, $endColl, 8]);

                $sheet->setCellValue('A9', 'Nama Perusahaan: ' . $this->sell->company);
                $sheet->mergeCells([1, 8, $endColl, 8]);

                // TABLE HEADERS
                $sheet->setCellValue('A11', 'Penjualan');
                $sheet->mergeCells('A11:A12');

                $sheet->setCellValue('B11', 'Jumlah');
                $sheet->mergeCells('B11:C12');

                $sheet->setCellValue('D11', 'Nama Barang');
                $sheet->mergeCells('D11:D12');

                $sheet->setCellValue('E11', 'Satuan Harga (Rp.)');
                $sheet->mergeCells('E11:E12');

                $sheet->setCellValue('F11', 'Jumlah (Rp.)');
                $sheet->mergeCells('F11:F12');

                $sheet->setCellValue('G11', 'Ket');
                $sheet->mergeCells('G11:G12');


                $sheet->getStyle("A11:I12")->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true
                    ],
                ]);

                $categories = ComponentCategory::all();
                $workingRow = 13;

                foreach ($categories as $category) {
                    $count = 1;
                    $sumQty = 0;
                    $sumTotalPrice = 0;
                    $first = true;

                    $rows = $this->sell->items()->whereHas(
                        'component',
                        fn ($q) =>  $q->where('category_id', $category->id)
                    )->get();

                    if (count($rows) <= 0) continue;

                    foreach ($rows as $item) {
                        $sheet->setCellValue([1, $workingRow], $first ? $category->name : '');
                        $sheet->setCellValue([2, $workingRow], $item->qty);
                        $sheet->setCellValue([3, $workingRow], $item->component->measurement);
                        $sheet->setCellValue([4, $workingRow], $item->component->name);
                        $sheet->setCellValue([5, $workingRow], $item->unit_price);
                        $sheet->setCellValue([6, $workingRow], $item->total_price);
                        $sheet->setCellValue([7, $workingRow], $item->description);

                        $sumQty += $item->qty;
                        $sumTotalPrice += $item->total_price;
                        $workingRow++;
                        $count++;
                        $first = false;
                    }

                    $sheet->setCellValue([1, $workingRow], '#');
                    $sheet->setCellValue([2, $workingRow], $sumQty);
                    $sheet->setCellValue([3, $workingRow], '');
                    $sheet->setCellValue([4, $workingRow], 'TOTAL');
                    $sheet->setCellValue([5, $workingRow], '');
                    $sheet->setCellValue([6, $workingRow], $sumTotalPrice);
                    $sheet->setCellValue([7, $workingRow], '');

                    $sheet->getStyle([1, $workingRow, 7, $workingRow])->applyFromArray([
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'FFA0A0A0',
                            ],
                        ],
                    ]);

                    $workingRow += 2;
                }

                $this->number = $workingRow - 2;
            },
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                // $header = $this->getTabelHeader();
                // $endColl = count($header);

                $sheet->getColumnDimension('A')->setWidth(80, 'px');
                $sheet->getColumnDimension('B')->setWidth(50, 'px');
                $sheet->getColumnDimension('C')->setWidth(50, 'px');
                $sheet->getColumnDimension('D')->setWidth(250, 'px');
                $sheet->getColumnDimension('E')->setWidth(100, 'px');
                $sheet->getColumnDimension('F')->setWidth(100, 'px');
                $sheet->getColumnDimension('G')->setWidth(100, 'px');
                $sheet->getColumnDimension('H')->setWidth(100, 'px');

                $sheet->getStyle([1, $this->number, 7, 11])->applyFromArray([
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
