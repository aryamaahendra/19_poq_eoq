<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class OrderExport implements FromCollection, WithEvents
{
    protected $order = null;
    protected $number = 0;

    public function __construct()
    {
        $this->order = request()->route('m_order');
        $this->order->load('items');
        $this->order->load('items.component');
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
                $endColl = 8;

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

                $sheet->setCellValue('A4', 'Bukti Penerimaan Gudang');
                $sheet->mergeCells([1, 4, $endColl, 4]);

                $sheet->setCellValue('A5', 'Nomor: ' . $this->order->no);
                $sheet->mergeCells([1, 5, $endColl, 5]);

                $sheet->getStyle([1, 4, $endColl, 5])->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ]
                ]);

                $sheet->setCellValue('A7', 'Diterima Dari: ' . $this->order->from);
                $sheet->mergeCells([1, 7, $endColl, 7]);

                $sheet->setCellValue('A8', 'Di: ' . $this->order->at);
                $sheet->mergeCells([1, 8, $endColl, 8]);

                // TABLE HEADERS
                $sheet->setCellValue('A10', 'No');
                $sheet->mergeCells('A10:A12');

                $sheet->setCellValue('B10', 'Banyaknya Pembelian');
                $sheet->mergeCells('B10:C12');

                $sheet->setCellValue('D10', 'Nama Barang');
                $sheet->mergeCells('D10:D12');

                $sheet->setCellValue('E10', 'Satuan Harga (Rp.)');
                $sheet->mergeCells('E10:E12');

                $sheet->setCellValue('F10', 'Jumlah (Rp.)');
                $sheet->mergeCells('F10:F12');

                $sheet->setCellValue('G10', 'Untuk No. Kendaraan');
                $sheet->mergeCells('G10:G12');

                $sheet->setCellValue('H10', 'Ket');
                $sheet->mergeCells('H10:H12');


                $sheet->getStyle("A10:I12")->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'wrapText' => true
                    ],
                ]);

                $workingRow = 13;
                $count = 1;
                $sumQty = 0;
                $sumTotalPrice = 0;
                foreach ($this->order->items as $item) {
                    $sheet->setCellValue([1, $workingRow], $count);
                    $sheet->setCellValue([2, $workingRow], $item->qty);
                    $sheet->setCellValue([3, $workingRow], $item->component->measurement);
                    $sheet->setCellValue([4, $workingRow], $item->component->name);
                    $sheet->setCellValue([5, $workingRow], $item->unit_price);
                    $sheet->setCellValue([6, $workingRow], $item->total_price);
                    $sheet->setCellValue([7, $workingRow], $item->vehicle_number);
                    $sheet->setCellValue([8, $workingRow], $item->description);

                    $sumQty += $item->qty;
                    $sumTotalPrice += $item->total_price;
                    $workingRow++;
                    $count++;
                }

                $sheet->setCellValue([1, $workingRow], '##');
                $sheet->setCellValue([2, $workingRow], $sumQty);
                $sheet->setCellValue([3, $workingRow], '');
                $sheet->setCellValue([4, $workingRow], 'TOTAL');
                $sheet->setCellValue([5, $workingRow], '');
                $sheet->setCellValue([6, $workingRow], $sumTotalPrice);
                $sheet->setCellValue([7, $workingRow], '');
                $sheet->setCellValue([8, $workingRow], '');

                $this->number = $workingRow;
            },
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                // $header = $this->getTabelHeader();
                // $endColl = count($header);

                $sheet->getColumnDimension('A')->setWidth(45, 'px');
                $sheet->getColumnDimension('B')->setWidth(50, 'px');
                $sheet->getColumnDimension('C')->setWidth(50, 'px');
                $sheet->getColumnDimension('D')->setWidth(250, 'px');
                $sheet->getColumnDimension('E')->setWidth(100, 'px');
                $sheet->getColumnDimension('F')->setWidth(100, 'px');
                $sheet->getColumnDimension('G')->setWidth(100, 'px');
                $sheet->getColumnDimension('H')->setWidth(100, 'px');
                $sheet->getColumnDimension('I')->setWidth(100, 'px');

                $sheet->getStyle([1, $this->number, 8, 10])->applyFromArray([
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
