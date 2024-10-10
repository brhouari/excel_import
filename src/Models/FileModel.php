<?php
namespace src\Models;

use src\Models\Model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

class FileModel {
    public function processExcel($file) {
        // Define the temporary path where the file is uploaded
        $filePath = $file['tmp_name'];

        // Load the Excel file using PHPSpreadsheet
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();

            // Get the data (example: reading the first row)
            $data = [];
            foreach ($sheet->getRowIterator() as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }

            // Process the data (for example, print it out)
            echo '<pre>';
            print_r($data);
            echo '</pre>';

        } catch (\Exception $e) {
            echo "Error processing Excel file: " . $e->getMessage();
        }
    }
}
