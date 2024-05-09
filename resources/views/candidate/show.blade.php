@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="card">
        <div class="card-header">
            <h1 class="mt-2 text-center">{{ $candidate->personal_information->first_name }} {{ $candidate->personal_information->surname }}</h1>
        </div>
        <div class="card-content m-3 mb-0">
            <h3 class="font-bold">Personal information</h3>
            <span class="font-bold">Location: </span><span>{{ $candidate->personal_information->city }}</span><br>
            <span class="font-bold">Email: </span><span>{{ $candidate->email }}</span><br>
            <span class="font-bold">Phone number: </span><span>{{ $candidate->personal_information->phone_number }}</span>
        </div> 
        <div class="card-content m-3 mb-0">
            <hr>
            <h3 class="font-bold">Work experience</h3>
            @forelse($candidate->work_experience as $work_experience)
                <span class="font-bold">{{ $work_experience->title }}</span><br>
                <span>{{ $work_experience->company_name }} -</span>
                <span>{{ $work_experience->job_type }}</span><br>
                <span>{{ date('d-m-Y', strtotime($work_experience->start_date)) }} -</span>
                <span>{{ date('d-m-Y', strtotime($work_experience->end_date)) }}</span><br>
                <span>{{ $work_experience->company_location }}</span><br><br>
            @empty
                <span>No work experience added.</span>
            @endforelse
        </div>
        <div class="card-content m-3 mb-0 mt-0">
            <hr>
            <h3 class="font-bold">Education</h3>
            @forelse($candidate->education as $education)
                <span class="font-bold">{{ $education->educational_institution }}</span><br>
                <span>{{ $education->degree }}, </span>
                <span>{{ $education->field_of_study }}</span><br>
                <span>{{ date('d-m-Y', strtotime($education->start_date)) }} -</span>
                <span>{{ date('d-m-Y', strtotime($education->end_date)) }}</span><br><br>
            @empty
                <span>No education added.</span>
            @endforelse
        </div>
        <div class="card-content m-3 mb-0 mt-0">
            <hr>
            <h3 class="font-bold">Certifications</h3>
            @forelse($candidate->certification as $certification)
                <span class="font-bold">{{ $certification->title }}</span><br>
                <span><a href="{{ asset('storage/' . $certification->certification) }}" target="_blank">Download file</a></span><br><br>
            @empty
                <span>No certifications added.</span>
            @endforelse
        </div>
        <div class="card-content m-3 mb-0 mt-0">
            <hr>
            <h3 class="font-bold">Skills</h3>
            <ul class="max-w-md space-y-1 list-disc list-inside">
                @forelse($candidate->skill as $skill)
                    <li>{{ $skill->name }}</li>
                @empty
                    <span>No skills added.</span>
                @endforelse
            </ul>
        </div>
        <div class="flex justify-center card-content m-2 mb-4">
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mt-2 mr-5">
                <a class="nav-link text-white" href="mailto:{{ $candidate->email }}" target="_blank">Contact {{ $candidate->personal_information->first_name }}</a>
            </button>
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mt-2">
                <a class="nav-link text-white" href="/profiles/{{ $candidate->id }}/generate-pdf" class="btn btn-primary">Download CV</a>
            </button>
        </div>
    </div>
@endsection