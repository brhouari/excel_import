<?php
namespace src\Models;

use src\Models\Model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

class FileModel extends Model {
    public function processExcel($file) {
        // Define the temporary path where the file is uploaded
        $filePath = $file['tmp_name'];
        
        // Load the Excel file using PHPSpreadsheet
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
             $data = [];
            // Get the data (example: reading the first row)
            $rowIterator = $sheet->getRowIterator(2);
            foreach ($rowIterator as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $rowData[] = $cell->getValue();
                    
                }
                //$data[] = $rowData;
                //unset($data[0]);
                $this->insertRowIntoDatabase($rowData);
               /*  echo '<pre>';
            print_r($rowData);
            echo '</pre>';*/
                  
            }
              echo "Data successfully inserted into the database.";
            // Process the data (for example, print it out)
          
             
        } catch (\Exception $e) {
            echo "Error processing Excel file: " . $e->getMessage();
        }
    }

    // Function to insert each row into the database
    private function insertRowIntoDatabase($rowData) {
        // Assuming the Excel file contains columns: name, email, age
        // Modify the columns and data according to your needs

        $sql = "INSERT INTO members (first_name, last_name, email,phone,status) VALUES (:FIRST_NAME, :LAST_NAME, :EMAIL,:PHONE,:STATUS)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':FIRST_NAME'  => $rowData[0],  // First column data (name)
            ':LAST_NAME' => $rowData[1],  // Second column data (email)
            ':EMAIL'   => $rowData[2],  // Third column data (age)
            ':PHONE'   => $rowData[3],  // Third column data (age)
            ':STATUS'   => $rowData[4],  // Third column data (age)
        ]);
    }
}
