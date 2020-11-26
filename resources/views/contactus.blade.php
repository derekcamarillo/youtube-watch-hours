@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>Contact us</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="form-wrapper row justify-content-center">
                <div class="col-md-10 col-lg-6">
                    <form action="#" method="post">
                        <div class="mb-4"><input type="text" class="form-control" placeholder="FULL NAME"></div>
                        <div class="mb-4"><input type="text" class="form-control" placeholder="EMAL ADDRESS"></div>
                        <div class="mb-4"><textarea class="form-control" placeholder="MESSAGE"></textarea></div>
                        <div class="text-center"><input type="submit" class="btn btn-primary" value="SEND MESSAGE"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection