<?php

namespace App\Core;

class Request
{
    public function uri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        $uri = str_replace($scriptName, '', $uri);
        return trim($uri, '/');
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }
}
