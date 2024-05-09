<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillsController extends Controller
{
    public function create()
    {
        return view('skill.create', [
            'skill' => auth()->user()->skill()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Skill::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
        ]);

        return redirect()->route('profile', auth()->id());
    }

    public function edit(Skill $skill)
    {       
        $authenticatedUser = auth()->user();
        
        if ($skill->user_id !== $authenticatedUser->id) {
            abort(403);
        }
        
        return view('skill.edit', compact('skill'));
    }

    public function update(Skill $skill)
    {        
        $authenticatedUser = auth()->user();
        
        if ($skill->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $skill->update($attributes);

        return redirect()->route('profile', auth()->id());
    }

    public function destroy(Skill $skill)
    {
        $authenticatedUser = auth()->user();
        
        if ($skill->user_id !== $authenticatedUser->id) {
            abort(403);
        }

        $skill->delete();

        return back();
    }
}
