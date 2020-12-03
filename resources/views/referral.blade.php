@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>REFERRALS</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            @include('profile.dashboard-bottom')

        </div>
    </div>
@endsection