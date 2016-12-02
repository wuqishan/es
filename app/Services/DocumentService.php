<?php

namespace App\Services;

use ServiceAgent;

class DocumentService
{
    const API_DOCUMENT = 'api/documents';

    public static function show()
    {
        $response = ServiceAgent::get('/');
        dd($response);
        return $response;
    }
}