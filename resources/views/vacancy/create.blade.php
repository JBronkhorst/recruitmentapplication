@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Vacancy</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/vacancies/create" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-2">
                <label for="title">Title *</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="location">Location *</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}" required>
                @error('location')
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
                <label for="description">Description *</label>
                <textarea type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" required>{{ old('description') }}</textarea>                
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="salary">Salary *</label>
                <input type="text" id="salary" name="salary" class="form-control" value="{{ old('salary') }}" required>
                @error('salary')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="email_contact_person">EMail contact person *</label>
                <input type="email" id="email_contact_person" name="email_contact_person" class="form-control" value="{{ old('email_contact_person') }}" required>
                @error('email_contact_person')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection