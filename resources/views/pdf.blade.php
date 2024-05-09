
<div class="card">
    <div class="card-header">
        <h1 class="mt-2 text-center">{{ $user->personal_information->first_name }} {{ $user->personal_information->surname }}</h1>
    </div>
    <div class="card-content m-3 mb-0">
        <h3 class="font-bold">Personal information</h3>
        <span class="font-bold">Location: </span><span>{{ $user->personal_information->city }}</span><br>
        <span class="font-bold">Email: </span><span>{{ $user->email }}</span><br>
        <span class="font-bold">Phone number: </span><span>{{ $user->personal_information->phone_number }}</span>
    </div> 
    <div class="card-content m-3 mb-0">
        <hr>
        <h3 class="font-bold">Work experience</h3>
        @forelse($user->work_experience as $work_experience)
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
        @forelse($user->education as $education)
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
        @forelse($user->certification as $certification)
            <span class="font-bold">{{ $certification->title }}</span>
        @empty
            <span>No certifications added.</span>
        @endforelse
    </div>
    <div class="card-content m-3 mb-0 mt-0">
        <hr>
        <h3 class="font-bold">Skills</h3>
        <ul class="max-w-md space-y-1 list-disc list-inside">
            @forelse($user->skill as $skill)
                <li>{{ $skill->name }}</li>
            @empty
                <span>No skills added.</span>
            @endforelse
        </ul>
    </div>
</div>