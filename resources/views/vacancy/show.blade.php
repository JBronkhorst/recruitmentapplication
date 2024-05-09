@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="card">
        <div class="card-header">
            <h1 class="mt-2 text-center">{{ $vacancy->title }}</h1>
            <div class="text-right">
                <span class="font-bold">Available since: </span><span>{{ date('d-m-Y', strtotime($vacancy->created_at)) }}</span><br>
                <span class="font-bold">Last updated: </span><span>{{ date('d-m-Y', strtotime($vacancy->updated_at)) }}</span>
            </div>
        </div>
        <div class="card-content m-3">
            <span class="font-bold">Location: </span><span>{{ $vacancy->location }}</span><br>
            <span class="font-bold">Job type: </span><span>{{ $vacancy->job_type }}</span><br>
            <span class="font-bold">Salary: </span><span>{{ $vacancy->salary }}</span>
        </div>
        <div class="card-content m-3">
            <h3 class="font-bold">About the job</h3>
            <span>{{ $vacancy->description }}</span>
        </div>
        <div class="flex justify-center card-content m-2 mb-4">
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mt-2">
                <a class="nav-link text-white" href="mailto:{{ $vacancy->email_contact_person }}?subject=Application%20for%20{{ $vacancy->title }}" target="_blank">Apply</a>
            </button>
        </div>
    </div>
@endsection