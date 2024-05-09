<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class SearchController extends Controller
{
    public function index()
    {
        return view('search', [
            'vacancies' => Vacancy::all()
        ]);
    }

    public function search(Request $request)
    {
        $search_query = $request->get('query');
        $vacancies = Vacancy::where('title', 'LIKE', '%'.$search_query.'%')
            ->orWhere('location', 'LIKE', '%'.$search_query.'%')
            ->orWhere('job_type', 'LIKE', '%'.$search_query.'%')->get();

        return view('search', compact('vacancies'));
    }
}
