@extends('layouts.loggedin')

@section('content_logged_in')
    <form class="flex items-center max-w-sm mx-auto mt-10" type="GET" action="{{ url('/candidates/search') }}">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="text" name="query" type="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search candidates..." required />
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
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Skills</th>
                </tr>
            </thead>
            <tbody>           
                @forelse($candidates as $candidate)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4">{{ $candidate->personal_information->first_name }} {{ $candidate->personal_information->surname }}</td>
                        <td class="px-6 py-4">
                            @foreach ($candidate->skill as $skill)
                                {{ $skill->name }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                        <button class="bg-blue-400 hover:bg-blue-500 rounded-lg shadow px-10 text-sm h-10 mr-5">
                            <a class="nav-link text-white w-max" href="/candidates/{{ $candidate->id }}/view">View</a>
                        </button>
                        </td>
                    </tr>
                @empty
                    <p>No candidates.</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection