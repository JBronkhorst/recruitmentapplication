@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="grid grid-cols-2 gap-4">
        <div class="card">
            <div class="card-header">
                Personal information 
            </div>
            <div class="card-content m-3">
                @if(isset($user->personal_information))
                    <span class="font-bold">First name: </span><span>{{ $user->personal_information->first_name }}</span><br>
                    <span class="font-bold">Surname: </span><span>{{ $user->personal_information->surname }}</span><br>
                    <span class="font-bold">Phone: </span><span>{{ $user->personal_information->phone_number }}</span><br>
                    <span class="font-bold">City: </span><span>{{ $user->personal_information->city }}</span><br>
                    <div class="flex justify-center">
                        <button class="bg-orange-400 hover:bg-orange-500 rounded-lg shadow px-10 text-sm h-10 mt-2">
                            <a class="nav-link text-white" href="/profiles/{{ $user->id }}/personal-information/edit">Edit personal information</a>
                        </button>
                    </div>
                @else
                    <p class="font-bold text-center">No personal information available</p>
                    <div class="flex justify-center">   
                        <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                            <a class="nav-link text-white" href="/profiles/{{ $user->id }}/personal-information">Add personal information</a>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Generate and download your CV
            </div>
            <div class="card-content m-3 flex justify-center">
                @if(isset($user->personal_information))
                    <a href="/profiles/{{ $user->id }}/generate-pdf" class="btn btn-primary">Download CV</a>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Work experience
            </div>
            <div class="card-content m-3">   
                @forelse($user->work_experience as $work_experience)
                    <ul class="list-group">
                        <li class="list-group-item mt-2">
                            <div class="grid grid-cols-6">
                                <div class="col-start-1 col-span-4 mt-1">
                                    {{ $work_experience->company_name }} - <span class="text-gray-500">{{ $work_experience->job_type }}</span>
                                </div>
                                <button class="col-start-5 col-span-1 bg-orange-400 hover:bg-orange-500 rounded-lg shadow mr-7">
                                    <a class="nav-link text-white" href="/profiles/work-experience/{{ $work_experience->id }}/edit">
                                        <svg class="h-8 w-8 fill-stroke text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>  <line x1="16" y1="5" x2="19" y2="8"></line></svg>
                                    </a>
                                </button>
                                <form method="POST" action="/profiles/work_experience/{{ $work_experience->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-400 hover:bg-red-500 rounded-lg shadow flex justify-end">
                                        <svg class="h-8 w-8 fill-stroke text-white hover:text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <line x1="4" y1="7" x2="20" y2="7"></line>  <line x1="10" y1="11" x2="10" y2="17"></line>  <line x1="14" y1="11" x2="14" y2="17"></line>  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>                                   
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @empty
                    <p class="font-bold text-center">No work experience available</p>
                @endforelse
                <div class="flex justify-center mt-2">   
                    <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                        <a class="nav-link text-white" href="/profiles/{{ $user->id }}/work-experience">Add work experience</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Education
            </div>
            <div class="card-content m-3">   
                @forelse($user->education as $education)
                    <ul class="list-group">
                        <li class="list-group-item mt-2">
                            <div class="grid grid-cols-6">
                                <div class="col-start-1 col-span-4 mt-1">
                                    {{ $education->educational_institution }} - <span class="text-gray-500">{{ $education->degree }}</span>
                                </div>
                                <button class="col-start-5 col-span-1 bg-orange-400 hover:bg-orange-500 rounded-lg shadow mr-7">
                                    <a class="nav-link text-white" href="/profiles/education/{{ $education->id }}/edit">
                                        <svg class="h-8 w-8 fill-stroke text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>  <line x1="16" y1="5" x2="19" y2="8"></line></svg>
                                    </a>
                                </button>
                                <form method="POST" action="/profiles/education/{{ $education->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-400 hover:bg-red-500 rounded-lg shadow flex justify-end">
                                        <svg class="h-8 w-8 fill-stroke text-white hover:text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <line x1="4" y1="7" x2="20" y2="7"></line>  <line x1="10" y1="11" x2="10" y2="17"></line>  <line x1="14" y1="11" x2="14" y2="17"></line>  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>                                   
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @empty
                    <p class="font-bold text-center">No education available</p>
                @endforelse
                <div class="flex justify-center mt-2">   
                    <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                        <a class="nav-link text-white" href="/profiles/{{ $user->id }}/education">Add education</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Certifications
            </div>
            <div class="card-content m-3">   
                @forelse($user->certification as $certification)
                    <ul class="list-group">
                        <li class="list-group-item mt-2">
                            <div class="grid grid-cols-6">
                                <div class="col-start-1 col-span-4 mt-1">
                                    {{ $certification->title }}
                                </div>
                                <button class="col-start-5 col-span-1 bg-orange-400 hover:bg-orange-500 rounded-lg shadow mr-7">
                                    <a class="nav-link text-white" href="/profiles/certification/{{ $certification->id }}/edit">
                                        <svg class="h-8 w-8 fill-stroke text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>  <line x1="16" y1="5" x2="19" y2="8"></line></svg>
                                    </a>
                                </button>
                                <form method="POST" action="/profiles/certification/{{ $certification->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-400 hover:bg-red-500 rounded-lg shadow flex justify-end">
                                        <svg class="h-8 w-8 fill-stroke text-white hover:text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <line x1="4" y1="7" x2="20" y2="7"></line>  <line x1="10" y1="11" x2="10" y2="17"></line>  <line x1="14" y1="11" x2="14" y2="17"></line>  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>                                   
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @empty
                    <p class="font-bold text-center">No certifications available</p>
                @endforelse
                <div class="flex justify-center mt-2">   
                    <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                        <a class="nav-link text-white" href="/profiles/{{ $user->id }}/certification">Add certification</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Skills
            </div>
            <div class="card-content m-3">   
                @forelse($user->skill as $skill)
                    <ul class="list-group">
                        <li class="list-group-item mt-2">
                            <div class="grid grid-cols-6">
                                <div class="col-start-1 col-span-4 mt-1">
                                    {{ $skill->name }}
                                </div>
                                <button class="col-start-5 col-span-1 bg-orange-400 hover:bg-orange-500 rounded-lg shadow mr-7">
                                    <a class="nav-link text-white" href="/profiles/skill/{{ $skill->id }}/edit">
                                        <svg class="h-8 w-8 fill-stroke text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>  <line x1="16" y1="5" x2="19" y2="8"></line></svg>
                                    </a>
                                </button>
                                <form method="POST" action="/profiles/skill/{{ $skill->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-400 hover:bg-red-500 rounded-lg shadow flex justify-end">
                                        <svg class="h-8 w-8 fill-stroke text-white hover:text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <line x1="4" y1="7" x2="20" y2="7"></line>  <line x1="10" y1="11" x2="10" y2="17"></line>  <line x1="14" y1="11" x2="14" y2="17"></line>  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>                                   
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @empty
                    <p class="font-bold text-center">No skills available</p>
                @endforelse
                <div class="flex justify-center mt-2">   
                    <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                        <a class="nav-link text-white" href="/profiles/{{ $user->id }}/skill">Add skill</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection