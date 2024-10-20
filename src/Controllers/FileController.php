<?php
namespace src\Controllers;

use src\Controllers\Controller;
use src\Models\FileModel;
//use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class FileController  extends Controller{

    public function index() {
        // Create an instance of the FileModel model
        $FileModel = new FileModel();
        
        // Fetch users from the database
        $data = $FileModel->getAllMembers();
        $this->view('upload_file', $data);
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