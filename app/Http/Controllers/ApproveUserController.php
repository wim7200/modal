<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        //return $user->name;
        //echo "hello";

        $approvedBy = Auth::user()->name;
        $user->update([
            'approved_at' => now(),
            'approved_by' => $approvedBy,
        ]);
        return redirect()->route('user.index')->withMessage('user is approved');
    }
}
