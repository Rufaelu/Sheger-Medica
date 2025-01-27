<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Herbs;
use App\Models\Remedies;

class Homepage extends Controller
{
    public function index()
    {
        $herbs = Herbs::all();
        $articles = Articles::all();
        $users = Pratitionerpage::home();

        $remedies = Remedies::with('herbs')->get();

       

        return view('Home', ['herbs' => $herbs, 'remedies' => $remedies, 'articles' => $articles, 'practitioners' => $users]);
    }

}
