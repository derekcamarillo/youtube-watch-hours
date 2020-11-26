@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>PROMOTE VIDEO</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="withdraw-form add-form">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Youtube URL"></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Video Title"></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Exposure"></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Views"></div>
                        <div class="col-md-12 mb-4"><input type="text" class="form-control" placeholder="Daily Visits Limit"></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Receive Views From"></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Receive Views From"></div>
                    </div>
                    <div class="btn-wrapper">
                        <div class="row">
                            <div class="col-md-4 align-self-center">Total Payment<strong>$1.00</strong></div>
                            <div class="col-md-4 text-center align-self-center"><input type="submit" class="btn btn-primary" value="Pay NoW"></div>
                            <div class="col-md-4 align-self-center">Payment Method<strong>PAYPAL</strong></div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection