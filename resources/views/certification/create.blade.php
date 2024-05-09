@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Certification</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/{{ auth()->user()->id }}/certification" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-2">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="certification">Certification *</label>
                <input type="file" id="certification" name="certification" class="form-control" value="{{ old('certification') }}" required>
                @error('degree')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection