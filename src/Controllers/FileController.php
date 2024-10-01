<?php
namespace src\Controllers;

use src\Controllers\Controller;
 
class FileController {
    public function upload() {
        // Check if the file is set in the POST request
        if(isset($_FILES['file'])) {
            // Pass the file to the model for processing
            $fileModel = new FileModel();
            $fileModel->saveFile($_FILES['file']);
        } else {
            // Handle the error: No file uploaded
            echo "No file uploaded!";
        }
    }
}
