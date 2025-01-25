<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApproveorReject extends Controller
{
    public function approvePractitioner($userId)
    {
        $user = User::findOrFail($userId);

        // Approve the user
        $user->update([
            'approval_status' => 'approved',
        ]);

        // Assign practitioner role
        if (!$user->hasRole('practitioner', 'practitioner')) {
            $user->assignRole(Role::findByName('practitioner', 'practitioner'));
        }


        return redirect()->back()->with('message', 'Practitioner approved successfully!');
    }
    public function rejectPractitioner($userId)
    {
        $user = User::findOrFail($userId);

        // Approve the user
        $user->update([
            'approval_status' => 'rejected',
        ]);

        // Assign practitioner role
        if (!$user->hasRole('practitioner', 'practitioner')) {
            $user->assignRole(Role::findByName('practitioner', 'practitioner'));
        }


        return redirect()->back()->with('message', 'Practitioner approved successfully!');
    }
}
