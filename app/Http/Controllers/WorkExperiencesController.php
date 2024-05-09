<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;

class WorkExperiencesController extends Controller
{
    public function create()
    {
        return view('work_experience.create', [
            'work_experience' => auth()->user()->work_experience()
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'company_branche' => ['required', 'string', 'max:255'],
            'company_description' => ['required']
        ]);

        WorkExperience::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'job_type' => request('job_type'),
            'company_name' => request('company_name'),
            'company_location' => request('company_location'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'company_branche' => request('company_branche'),
            'company_description' => request('company_description')
        ]);

        return redirect()->route('profile', auth()->id());
    }

    public function edit(WorkExperience $work_experience)
    {        
        return view('work_experience.edit', compact('work_experience'));
    }

    public function update(WorkExperience $work_experience)
    {        
        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'company_branche' => ['required', 'string', 'max:255'],
            'company_description' => ['required']
        ]);
        
        $work_experience->update($attributes);

        return redirect()->route('profile', auth()->id());
    }

    public function destroy(WorkExperience $work_experience)
    {
        $work_experience->delete();

        return back();
    }
}
