<?php

namespace App\Core;
use Carbon\Carbon;

class BaseController 
{
    protected function render($view, $data = [])
    {
        try {
            $data['Carbon'] = new Carbon();
            extract($data);
            
            $headerPath = __DIR__ . "/../../views/layouts/header.php";
            $contentPath = __DIR__ . "/../../views/$view.php";
            $footerPath = __DIR__ . "/../../views/layouts/footer.php";

            if (file_exists($headerPath)) {
                require $headerPath;
            }
            
            echo '<div class="container mt-4 mb-4" style="min-height: calc(100vh - 221px);">'; // 121px header + 100px footer
            if (file_exists($contentPath)) {
                require $contentPath;
            }
            echo '</div>';
            
            if (file_exists($footerPath)) {
                require $footerPath;
            }
            
        } catch (\Exception $e) {
            error_log($e->getMessage());
            echo "Error loading page layout.";
        }
    }
}