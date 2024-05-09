@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Update your skill</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/skill/{{ $skill->id }}/edit" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <div class="form-group mb-2">
                <label for="name">Skill *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $skill->name }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <a href="/profiles/{{ $skill->user_id }}" class="hover:underline">Cancel</a>
        </form>
    </div>
@endsection