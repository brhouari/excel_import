<?php
namespace src\Models;

use src\Models\Model;
class FileModel {
    public function saveFile($file) {
        // Check if the file was uploaded without errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Define the target directory and move the uploaded file
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($file['name']);
            
            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                // Success: The file is saved, you can store $uploadFile path in the database
                echo "File uploaded successfully!";
            } else {
                // Error: Moving the file failed
                echo "File upload failed!";
            }
        } else {
            // Error: Handle specific file upload error
            echo "Error during file upload!";
        }
    }
}
