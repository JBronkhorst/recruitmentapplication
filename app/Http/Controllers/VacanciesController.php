<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacanciesController extends Controller
{
    public function index()
    {
        return view('vacancy.index', [
            'vacancies' => Vacancy::all()
        ]);
    }

    public function create()
    {        
        return view('vacancy.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'salary' => ['required', 'string', 'max:255'],
            'email_contact_person' => ['required', 'string', 'email', 'max:255']
        ]);

        Vacancy::create([
            'title' => request('title'),
            'location' => request('location'),
            'job_type' => request('job_type'),
            'description' => request('description'),
            'salary' => request('salary'),
            'email_contact_person' => request('email_contact_person')
        ]);

        return redirect('vacancies');
    }

    public function edit(Vacancy $vacancy)
    {        
        return view('vacancy.edit', compact('vacancy'));
    }

    public function update(Vacancy $vacancy)
    {        
        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'salary' => ['required', 'string', 'max:255'],
            'email_contact_person' => ['required', 'string', 'email', 'max:255']
        ]);
        
        $vacancy->update($attributes);

        return redirect('vacancies');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        return back();
    }

    public function search(Request $request)
    {
        $search_query = $request->get('query');
        $vacancies = Vacancy::where('title', 'LIKE', '%'.$search_query.'%')
            ->orWhere('location', 'LIKE', '%'.$search_query.'%')
            ->orWhere('job_type', 'LIKE', '%'.$search_query.'%')->get();

        return view('vacancy.index', compact('vacancies'));
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', ['vacancy' => $vacancy]);
    }
}
