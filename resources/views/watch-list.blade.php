@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>WATCH VIDEO</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-center">
                        @foreach($orders as $order)
                            <div class="col-md-6 mb-4">
                                <div class="video-block">
                                    <div class="content">
                                        <div class="row mb-2">
                                            <div class="col-7">Reward: {{ $order->seconds/ 30 * 9 }} coins</div>
                                            <div class="col-5 text-right">Api Views</div>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('watch', $order) }}" class="btn btn-primary">WATCH</a>
                                            <a href="#" class="btn btn-secondary">SKIP</a>
                                        </div>
                                    </div>
                                    <div class="full-img"><img src="https://img.youtube.com/vi/{{ $order->video }}/hqdefault.jpg" alt=""></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection