@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Work experience</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/{{ auth()->user()->id }}/work-experience" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-2">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="job_type">Job type *</label>
                <input type="text" id="job_type" name="job_type" class="form-control" value="{{ old('job_type') }}" required>
                @error('job_type')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="company_name">Company name *</label>
                <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
                @error('company_name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="company_location">Company location *</label>
                <input type="text" id="company_location" name="company_location" class="form-control" value="{{ old('company_location') }}" required>
                @error('company_location')
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
                <label for="company_branche">Industry *</label>
                <input type="text" id="company_branche" name="company_branche" class="form-control" value="{{ old('company_branche') }}" required>
                @error('company_branche')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="company_description">Description *</label>
                <textarea type="text" id="company_description" name="company_description" class="form-control" value="{{ old('company_description') }}" required>{{ old('company_description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection