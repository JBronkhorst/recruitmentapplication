@extends('layouts.loggedin')

@section('content_logged_in')
    <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
        <a class="nav-link text-white" href="/vacancies/create">Add vacancy</a>
    </button>
    <form class="flex items-center max-w-sm mx-auto mt-10" type="GET" action="{{ url('/vacancies/search') }}">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="text" name="query" type="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search vacancies..." required />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form>
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Location</th>
                    <th scope="col" class="px-6 py-3">Job type</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vacancies as $vacancy)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4">{{ $vacancy->title }}</td>
                        <td class="px-6 py-4">{{ $vacancy->location }}</td>
                        <td class="px-6 py-4">{{ $vacancy->job_type }}</td>
                        <td class="px-6 py-4">
                            <button class="col-start-11 col-span-1 bg-orange-400 hover:bg-orange-500 rounded-lg shadow mr-9">
                                <a class="nav-link text-white" href="/vacancies/{{ $vacancy->id }}/edit">
                                    <svg class="h-8 w-8 fill-stroke text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>  <line x1="16" y1="5" x2="19" y2="8"></line></svg>
                                </a>
                            </button>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="/vacancies/{{ $vacancy->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-400 hover:bg-red-500 rounded-lg shadow flex justify-end">
                                    <svg class="h-8 w-8 fill-stroke text-white hover:text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"></path>  <line x1="4" y1="7" x2="20" y2="7"></line>  <line x1="10" y1="11" x2="10" y2="17"></line>  <line x1="14" y1="11" x2="14" y2="17"></line>  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>                                   
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No vacancies.</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection