<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $authenticatedUser = auth()->user();
        
        if ($user->id !== $authenticatedUser->id) {
            abort(403);
        }

        return view('profile', [
            'user' => $user
        ]);
        
    }

    public function generatePdf(User $user)
    {
        $authenticatedUser = auth()->user();

        if ($user->id == $authenticatedUser->id || $authenticatedUser->is_admin) {
            $pdf = SnappyPdf::loadView('pdf', compact('user'));

            return $pdf->download('cv.pdf');
        }
        else 
        {
            abort(403);
        }

        

    }
    
}
