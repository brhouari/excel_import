<?php


// app/Helpers/UrlHelper.php

namespace src\Helpers;

class UrlHelper {
    /**
     * Generates a URL for a static asset (CSS, JS, images, etc.)
     * @param string $path The relative path to the asset (e.g., 'css/style.css')
     * @return string The full URL to the asset
     */
    public static function asset($path) {
        // Get the base URL from server variables
        $base_url = self::baseUrl();
        
        // Ensure there are no leading slashes in $path
        $path = ltrim($path, '/');
        
        return $base_url . '/' . $path;
    }

    /**
     * Generates the base URL (useful if the app is in a subdirectory)
     * @return string The base URL
     */
    public static function baseUrl() {
        // Check if the app is in a subdirectory
        $script_name = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        
        return $protocol . '://' . $_SERVER['HTTP_HOST'] . $script_name;
    }
}
