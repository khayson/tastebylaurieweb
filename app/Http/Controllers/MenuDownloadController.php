<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

class MenuDownloadController extends Controller
{
    public function download($format)
    {
        if ($format === 'pdf') {
            $filePath = public_path('menu/Taste By Laurie food Menu .pdf');

            if (!file_exists($filePath)) {
                abort(404, 'Menu file not found');
            }

            return response()->download($filePath, 'luxury-catering-menu.pdf', [
                'Content-Type' => 'application/pdf'
            ]);
        }

        return match ($format) {
            'excel' => $this->downloadExcel(),
            default => abort(404),
        };
    }

    private function downloadExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set title
        $sheet->setCellValue('A1', 'LUXURY CATERING MENU');
        $sheet->mergeCells('A1:D1');

        $row = 3;
        foreach ($this->getMenuData() as $category => $data) {
            // Category header
            $sheet->setCellValue("A$row", $data['title']);
            $sheet->mergeCells("A$row:D$row");
            $row++;

            $sheet->setCellValue("A$row", $data['subtitle']);
            $sheet->mergeCells("A$row:D$row");
            $row += 2;

            // Packages
            foreach ($data['packages'] as $package) {
                $sheet->setCellValue("A$row", $package['name']);
                $sheet->setCellValue("D$row", $package['serves']);
                $row++;

                foreach ($package['items'] as $item) {
                    $sheet->setCellValue("B$row", "• " . $item);
                    $row++;
                }
                $row++;
            }
            $row += 2;
        }

        // Style the document
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => '8B4513']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'FFF8DC']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_MEDIUM, 'color' => ['rgb' => 'DEB887']]
            ]
        ]);

        // Style category headers
        foreach (range(3, $row) as $rowNum) {
            if ($sheet->getCell("A$rowNum")->getValue() !== '') {
                $sheet->getStyle("A$rowNum:D$rowNum")->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['rgb' => '8B4513']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'FFF8DC']]
                ]);
            }
        }

        $writer = new Xlsx($spreadsheet);

        return response()->stream(
            function() use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="luxury-catering-menu.xlsx"'
            ]
        );
    }

    private function getMenuData()
    {
        return [
            'starters' => [
                'title' => 'Starters Selection',
                'subtitle' => 'Begin Your Journey',
                'packages' => [
                    [
                        'name' => 'Classic Appetizers',
                        'items' => [
                            'Samosa',
                            'Spring Rolls',
                            'Meat Skewers',
                            'Goat Light Soup'
                        ],
                        'serves' => '8-10 guests'
                    ],
                    [
                        'name' => 'Savory Bites',
                        'items' => [
                            'Quiche',
                            'Meatballs',
                            'Chicken Wrap',
                            'Yam Balls'
                        ],
                        'serves' => '8-10 guests'
                    ],
                    [
                        'name' => 'Signature Starters',
                        'items' => [
                            'Club Sandwich',
                            'Chicken Kebab',
                            'Mini Burgers',
                            'Spicy Gizzard Skewers'
                        ],
                        'serves' => '8-10 guests'
                    ]
                ]
            ],
            // Reference to menu data from landing/menu.blade.php
            'mains' => [
                'title' => 'Main Course Collections',
                'subtitle' => 'The Heart of Your Event',
                'packages' => [
                    [
                        'name' => 'Ghanaian Delights',
                        'items' => [
                            'Jollof Rice',
                            'Fried Rice',
                            'Curried Rice/Waakye',
                            'Banku & Tilapia'
                        ],
                        'serves' => '12-15 guests'
                    ],
                    [
                        'name' => 'Continental Classics',
                        'items' => [
                            'Lasagna',
                            'Chicken Alfredo',
                            'Roasted Garlic Potatoes',
                            'Pesto Pasta'
                        ],
                        'serves' => '12-15 guests'
                    ],
                    [
                        'name' => 'Local Favorites',
                        'items' => [
                            'Fufu with Goat Light Soup',
                            'Rice Balls with Groundnut Soup',
                            'Apem/Bayere Ampesi with Kontomire Stew',
                            'Kokonte and Groundnut Soup'
                        ],
                        'serves' => '12-15 guests'
                    ]
                ]
            ]
        ];
    }
}
