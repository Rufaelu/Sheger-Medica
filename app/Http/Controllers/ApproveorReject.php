<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class ApproveorReject extends Controller
{
    public function approvePractitioner($id)
    {
        $user = User::findOrFail($id);

        // Approve the user
        // Assign practitioner role
        if (!$user->hasRole('practitioner', 'practitioner')) {
            $user->assignRole(Role::findByName('practitioner', 'practitioner'));
            $user->update([
                'approval_status' => 'approved',
            ]);
        }


        return redirect(route('admin'));
        }
    public function rejectPractitioner($id)
    {
        $user = User::findOrFail($id);

        // reject the user
        $user->update([
            'approval_status' => 'rejected',
        ]);



        return redirect(route('admin'));
    }
}
