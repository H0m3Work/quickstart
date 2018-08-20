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

    public function columnFormats(): array 
    {
    	return [
    		'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    		'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    	];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            },
        ];
    }
}
