<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;


class practitionerController extends Controller
{
    function practitioner(){
        $data=DB::select("select * from practitioner");    }
    //
}
