<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\Skill;

class CandidatesController extends Controller
{
    public function index()
    {
        $candidates = User::with('personal_information', 'skill')
            ->where('is_admin', 0)
            ->get();

        return view('candidate.index', compact('candidates'));
    }

    public function show(User $user)
    {
        if($user->is_admin == 0)
        {
            return view('candidate.show', ['candidate' => $user]);
        } 
        else
        {
            abort(403);
        }
    }

    public function search(Request $request)
    {
        $search_query = $request->get('query');

        $candidates = User::with('personal_information', 'skill')
        ->where('is_admin', 0)
        ->where(function ($query) use ($search_query) 
        {
            $query->whereHas('personal_information', function ($query) use ($search_query) 
            {
                $query->where('first_name', 'LIKE', '%'.$search_query.'%')
                        ->orWhere('surname', 'LIKE', '%'.$search_query.'%');
            })->orWhereHas('skill', function ($query) use ($search_query) 
            {
                $query->where('name', 'LIKE', '%'.$search_query.'%');
            });
        })->get();

        return view('candidate.index', compact('candidates'));
    }
}
