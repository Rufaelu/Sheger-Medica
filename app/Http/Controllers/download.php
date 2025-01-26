<?php

namespace App\Http\Controllers;

class download extends Controller
{
    public function download_certificate($path)
    {
        dd($path);
        return response()->file($path);
    }
}
