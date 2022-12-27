<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    public function createDocument() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Фамилия');
        $sheet->setCellValue('B1', 'Имя');
        $sheet->setCellValue('C1', 'Адрес');
        $sheet->setCellValue('A2', 'Копп');
        $sheet->setCellValue('B2', 'Андрей');
        $sheet->setCellValue('C2', '74706 Osterburken, Germany');

        $writer = new Xlsx($spreadsheet);
        $writer->save('xlsx/excel.xlsx');
    }
}