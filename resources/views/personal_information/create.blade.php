@extends('layouts.loggedin')

@section('content_logged_in')
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
        <h2 class="mb-2">Personal information</h2>
        <p class="italic text-sm mb-4">Fields with * are required</p>
        <form method="POST" action="/profiles/{{ auth()->user()->id }}/personal-information" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-2">
                <label for="first_name">First name *</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="surname">Surname *</label>
                <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname') }}" required>
                @error('surname')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="phone_number">Phone number *</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                @error('phone_number')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="city">City *</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}" required>
                @error('city')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection