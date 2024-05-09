@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <x-navbar></x-navbar>
                @yield('content_logged_in')
            </div>
        </div>
    </div>
@endsection
