<?php

namespace App\Exports;

use App\Models\Sale;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalesExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    public function collection()
    {
        return Sale::with(
            'dealer',
            'stock'
        )->get()->map(function ($sale) {

            return [

                'Invoice' => $sale->invoice_number,

                'Dealer' => $sale->dealer->name ?? '-',

                'Tea' => $sale->stock->tea_name ?? '-',

                'Quantity' => $sale->quantity,

                'Total' => $sale->total_amount,

                'Date' => $sale->created_at->format('d-m-Y'),

            ];
        });
    }

    public function headings(): array
    {
        return [

            'Invoice Number',
            'Dealer Name',
            'Tea Name',
            'Quantity',
            'Total Amount',
            'Date',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [

            1 => [

                'font' => [
                    'bold' => true,
                    'size' => 13,
                ],

            ],

        ];
    }
}