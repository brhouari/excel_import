<?php
namespace src\Controllers;

use src\Controllers\Controller;
use src\Models\FileModel;
//use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class FileController  extends Controller{

    public function index() {
        $this->view('upload_file', ['title' => 'upload']);
    }
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            
            // Check if the file is an Excel file
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['xls', 'xlsx'];

            if (in_array($fileExtension, $allowedExtensions)) {
                // Pass the file to the model for processing
                $excelModel = new FileModel();
                $excelModel->processExcel($file);
            } else {
                echo "Invalid file type. Please upload an Excel file.";
            }
        } else {
            echo "Please upload a file.";
        }
}
}