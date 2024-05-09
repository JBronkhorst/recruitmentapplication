<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;

class CertificationsController extends Controller
{
    public function create()
    {
        return view('certification.create', [
            'certification' => auth()->user()->certification()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'certification' => ['required', 'file']
        ]);

        if (request()->hasFile('certification')) 
        {
            // Store the uploaded file in the public disk under the 'certifications' directory
            $filePath = request('certification')->store('certifications', 'public');
            // Create the Certification model after storing the file
            Certification::create([
                'user_id' => auth()->id(),
                'title' => $attributes['title'],
                'certification' => $filePath
            ]);
        }

        return redirect()->route('profile', auth()->id());
    }

    public function edit(Certification $certification)
    {   
        $authenticatedUser = auth()->user();
        
        if ($certification->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        return view('certification.edit', compact('certification'));
    }

    public function update(Certification $certification)
    {    
        $authenticatedUser = auth()->user();

        if ($certification->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        $attributes = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'certification' => ['required', 'file']
        ]);

        if (request()->hasFile('certification')) 
        {
            // Store the uploaded file in the public disk under the 'certifications' directory
            $filePath = request('certification')->store('certifications', 'public');
            $certification->update($attributes);
        }
        
        return redirect()->route('profile', auth()->id());
    }

    public function destroy(Certification $certification)
    {
        $authenticatedUser = auth()->user();

        if ($certification->user_id !== $authenticatedUser->id) {
            abort(403);
        }
        
        $certification->delete();

        return back();
    }
}
