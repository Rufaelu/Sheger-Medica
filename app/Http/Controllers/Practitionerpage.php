<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Herbs;
use App\Models\Remedies;
use App\Models\Articles;

class Practitionerpage extends Controller
{
    public function profile($id)
    {
        $practitioner = User::find($id);
        $herbs = Herbs::where('user_id', $id)->get();
        $remedies = Remedies::where('user_id', $id)->get();
        $articles = Articles::where('user_id', $id)->get();
        return view('Profile', ['practitioner' => $practitioner, 'herbs' => $herbs, 'remedies' => $remedies, 'articles' => $articles]);
    }

    public function index()
    {
        return view('Practitioner', ['practitioners' => $this->home()]);
    }
    public static function home()
    {
        $users = User::where('approval_status', 'approved')->get();
        $usersWithCounts = $users->map(function ($user) {
            $user->herbs_posted = $user->herbs()->count(); // Count of herbs posted by the user
            $user->remedies_posted = $user->remedies()->count(); // Count of remedies posted by the user
            $user->articles_posted = $user->articles()->count(); // Count of articles posted by the user
            return $user;
        });

        return $usersWithCounts;

    }
}
