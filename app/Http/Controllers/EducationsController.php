<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationsController extends Controller
{
    public function create()
    {
        return view('education.create', [
            'education' => auth()->user()->education()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'educational_institution' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'grade' => ['required', 'string', 'max:255']
        ]);

        Education::create([
            'user_id' => auth()->id(),
            'educational_institution' => request('educational_institution'),
            'degree' => request('degree'),
            'field_of_study' => request('field_of_study'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'grade' => request('grade')
        ]);

        return redirect()->route('profile', auth()->id());
    }

    public function edit(Education $education)
    {        
        $authenticatedUser = auth()->user();
        
        if ($education->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        return view('education.edit', compact('education'));
    }

    public function update(Education $education)
    {   
        $authenticatedUser = auth()->user();

        if ($education->user_id !== $authenticatedUser->id) {
            abort(403);
        }
        
        $attributes = request()->validate([
            'educational_institution' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'field_of_study' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'grade' => ['required', 'string', 'max:255']
        ]);
        
        $education->update($attributes);

        return redirect()->route('profile', auth()->id());
    }

    public function destroy(Education $education)
    {
        $authenticatedUser = auth()->user();
        
        if ($education->user_id !== $authenticatedUser->id) {
            abort(403);
        }
        
        $education->delete();

        return back();
    }
}
