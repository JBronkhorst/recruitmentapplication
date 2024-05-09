@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Education</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/{{ auth()->user()->id }}/education" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-2">
                <label for="educational_institution">Educational institution *</label>
                <input type="text" id="educational_institution" name="educational_institution" class="form-control" value="{{ old('educational_institution') }}" required>
                @error('educational_institution')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="degree">Degree *</label>
                <input type="text" id="degree" name="degree" class="form-control" value="{{ old('degree') }}" required>
                @error('degree')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="field_of_study">Field of study *</label>
                <input type="text" id="field_of_study" name="field_of_study" class="form-control" value="{{ old('field_of_study') }}" required>
                @error('field_of_study')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="start_date">Start date *</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                @error('start_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="end_date">End date *</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                @error('end_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="grade">Grade *</label>
                <input type="text" id="grade" name="grade" class="form-control" value="{{ old('grade') }}" required>
                @error('grade')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection