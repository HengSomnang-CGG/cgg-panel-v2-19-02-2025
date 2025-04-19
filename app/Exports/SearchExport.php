<?php

namespace App\Exports;

use App\Models\Search;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SearchExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {

        return [
            'ID',
            'Domain',
            'Date',
            'Keyword',
            'Title',
            'Website Name',
            'Description',
        ];
    }

    public function collection()
    {
        return Search::select('id', 'domain', 'date', 'keyword', 'title', 'website_name', 'description')->get();
    }

    // Apply styles for header and make table highlight
    public function styles(Worksheet $sheet)
    {
        $randomColor = sprintf('%02X%02X%02X', rand(150, 255), rand(150, 255), rand(150, 255)); // Light color
        return [
            // Style header row (A1:G1)

            1 => [
                'font' => ['bold' => true,],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => $randomColor], // Highlight header with blue
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER, // Align text to left
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    // Apply borders and highlight table
    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function (\Maatwebsite\Excel\Events\AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                $cellRange = 'A1:' . $highestColumn . $highestRow;

                // Apply borders to all cells
                $sheet->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'], // Black border
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER, // Align table text to left
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $randomColor = sprintf('%02X%02X%02X', rand(150, 255), rand(150, 255), rand(150, 255)); // Light color

                for ($row = 2; $row <= $highestRow; $row++) {
                    if ($row % 2 == 0) { // Apply color only to even rows
                        $sheet->getStyle("A{$row}:{$highestColumn}{$row}")->applyFromArray([

                            'fill' => [
                                'fillType' => Fill::FILL_SOLID,
                                'startColor' => ['rgb' => $randomColor], // Apply the same random background color
                            ],
                        ]);

                    }
                }
            },
        ];
    }
}
