@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>PROMOTE VIDEO</h1>
                <p>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </p>
            </div>

            @include('profile.dashboard-top')

            <div class="withdraw-form add-form">
                <form action="{{ route('order.create') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" name="link" placeholder="Youtube URL">
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" name="title" placeholder="Video Title">
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="form-control" name="seconds" placeholder="Exposure">
                                <option value="30">30 seconds</option>
                                <option value="60">60 seconds</option>
                                <option value="90">90 seconds</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="number" class="form-control" name="quantity" placeholder="Views">
                        </div>
                        <div class="col-md-12 mb-4">
                            <input type="number" class="form-control" name="daily_limit" value="0" placeholder="Daily Visits Limit">
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="form-control" name="gender">
                                <option value="%">ALL</option>
                                <option value="male">MALE</option>
                                <option value="female">FEMALE</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <select class="form-control" name="country">
                                <option value="%">ALL</option>
                                <option value="china">China</option>
                                <option value="lebanon">Lebanon</option>
                                <option value="united states">United States</option>
                            </select>
                        </div>
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