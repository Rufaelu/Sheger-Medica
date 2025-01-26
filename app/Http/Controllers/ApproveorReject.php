<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class ApproveorReject extends Controller
{
    public function approvePractitioner($userId)
    {
        $user = User::findOrFail($userId);

        // Approve the user


        // Assign practitioner role
        if (!$user->hasRole('practitioner', 'practitioner')) {
            $user->assignRole(Role::findByName('practitioner', 'practitioner'));
            $user->update([
                'approval_status' => 'approved',
            ]);
        }


        return redirect()->back()->with('message', 'Practitioner approved successfully!');
    }
    public function rejectPractitioner($userId)
    {
        $user = User::findOrFail($userId);

        // reject the user
        $user->update([
            'approval_status' => 'rejected',
        ]);



        return redirect()->back()->with('message', 'Practitioner Rejected successfully!');
    }
}
