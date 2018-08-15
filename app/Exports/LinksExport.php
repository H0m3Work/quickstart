<?php

namespace App\Exports;

use App\Models\Link;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class LinksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Link::all();
    }

    public function headings(): array
    {
        return [
            'STT',
            'Title',
            'Url',
            'Description',
            'Created at',
            'Updated at'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                // $event->sheet->styleCells(
                //     'A2:F58',
                //     [
                //         'borders' => [
                //             'outline' => [
                //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                //                 'color' => ['argb' => 'FFFF0000'],
                //             ],
                //         ]
                //     ]
                // );
            },
        ];
    }
}
