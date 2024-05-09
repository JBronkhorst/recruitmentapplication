<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformation;

class PersonalInformationsController extends Controller
{
    public function create()
    {
        return view('personal_information.create', [
            'personal_information' => auth()->user()->personal_information()
        ]);
    }

    public function store()
    {

        $attributes = request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,15'],
            'city' => ['required', 'string', 'max:255']
        ]);

        PersonalInformation::create([
            'user_id' => auth()->id(),
            'first_name' => request('first_name'),
            'surname' => request('surname'),
            'phone_number' => request('phone_number'),
            'city' => request('city')
        ]);

        return redirect()->route('profile', auth()->id());
    }

    public function edit(PersonalInformation $personal_information)
    {        
        $authenticatedUser = auth()->user();
        
        if ($personal_information->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        return view('personal_information.edit', compact('personal_information'));
    }

    public function update(PersonalInformation $personal_information)
    {   
        $authenticatedUser = auth()->user();
        
        if ($personal_information->user_id !== $authenticatedUser->id) {
            abort(403);
        }
        
        $attributes = request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,15'],
            'city' => ['required', 'string', 'max:255']
        ]);
        
        $personal_information->update($attributes);

        return redirect()->route('profile', auth()->id());
    }
}
