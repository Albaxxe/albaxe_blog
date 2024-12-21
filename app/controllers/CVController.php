<?php

namespace App\Controllers;

class CVController
{
    public function show()
    {
        $title = "Mon CV";
        ob_start();
        include __DIR__ . '/../views/cv.php';
        return ob_get_clean();
    }
}
