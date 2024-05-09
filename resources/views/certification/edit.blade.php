@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Update your certification</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/certification/{{ $certification->id }}/edit" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <div class="form-group mb-2">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $certification->title }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="certification">Certification *</label>
                <input type="file" id="certification" name="certification" class="form-control" required>
                @error('certification')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <a href="/profiles/{{ $certification->user_id }}" class="hover:underline">Cancel</a>
        </form>
    </div>
@endsection