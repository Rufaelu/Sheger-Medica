<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Articles;
use App\Models\Herbs;
use App\Models\Remedies;
use App\Models\User;
use Carbon\Carbon;


class Adminpage extends Controller
{
    public function index()
    {
        $applications = User::where('approval_status', 'pending')
            ->whereNotNull('specialties')
            ->get();
        $admins = User::role('admin', 'admin')->get();



    $usersdata = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

    // Prepare cumulative data
    $cumulativeTotal = 0;
    $monthlyData = [];
    $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    foreach ($usersdata as $userdata) {
        $cumulativeTotal += $userdata->total;
        $monthlyData[$userdata->month] = $cumulativeTotal; // Assign cumulative total to the correct month
    }

    // Ensure all months are included
    $data = [];
    for ($i = 1; $i <= 12; $i++) {
        $data[] = $monthlyData[$i] ?? ($i === 1 ? 0 : $data[$i - 2]); // Use previous month's total if no users for that month
    }

        // Count all users
        $totalUsers = User::count() - $admins->count();
        $totalArticles = Articles::count();
        $totalRemedies = Remedies::count();
        $totalHerbs = Herbs::count();

        // Count all practitioners (approval_status = 'accepted')
        $practitionersCount = User::where('approval_status', 'approved')->count();

        return view('admin', ['applications' => $applications, 'totalUsers' => $totalUsers, 'practitionersCount' => $practitionersCount, 'totalArticles' => $totalArticles, 'totalRemedies' => $totalRemedies, 'totalHerbs' => $totalHerbs, 'admins' => $admins, 'data' => $data]);
    }

    public function get_user_details(string $id)
    {

        $user = User::findOrFail($id);
        return view('admin_verify_form', ['user' => $user]);

    }

    public function admindprofile($id)
    {

        $users = User::where('user_id', $id)->get();

        return view('profile.admin', ['user' => $users]);

    }
    public function adminregister(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()], // At least 15 years old
            'gender' => ['required', 'string', 'in:male,female,other'],
        ]);

        $fullname = RegisteredUserController::splitName($request->name);

        $fname = $fullname[0];
        $lname = $fullname[1] ?? '';

        // Prepare user data
        $userData = [
            'first_name' => $fname,
            'last_name' => $lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'approval_status' => null, // Default approval status
            'dob' => $request->dob,
            'gender' => $request->gender,
        ];
        User::create($userData)->assignRole(Role::findByName('admin', 'admin'));

        return $this->index();
    }

}
