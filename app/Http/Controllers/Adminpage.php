<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articles;
use App\Models\Remedies;
use App\Models\Herbs;

class Adminpage extends Controller
{
    public function index()
    {
        $users = User::where('approval_status', 'pending')
            ->whereNotNull('specialties')
            ->get();

        // Count all users
        $totalUsers = User::count();
        $totalArticles = Articles::count();
        $totalRemedies = Remedies::count();
        $totalHerbs = Herbs::count();

        // Count all practitioners (approval_status = 'accepted')
        $practitionersCount = User::where('approval_status', 'accepted')->count();

        return view('admin', ['users' => $users, 'totalUsers' => $totalUsers, 'practitionersCount' => $practitionersCount, 'totalArticles' => $totalArticles, 'totalRemedies' => $totalRemedies, 'totalHerbs' => $totalHerbs]);
    }
    public function get_user_details(string $id)
    {

        $user = User::findOrFail($id);
        return view('admin_varify_form', ['user' => $user]);
    }

    public function admindprofile($id)
    {

        $users = User::where('user_id',$id)->get();

                return view('admin', ['user' => $users]);

    }

}
