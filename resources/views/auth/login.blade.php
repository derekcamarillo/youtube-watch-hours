@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>LOGIN</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="form-wrapper row justify-content-center">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="col-md-10 col-lg-6">
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="mb-4"><input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="USERNAME / EMAIL ADDRESS"></div>
                        <div class="mb-4"><input type="password" name="password" class="form-control" placeholder="PASSWORD"></div>
                        <div class="mb-4 text-center"><input class="inp-cbx" id="cbx" name="remember" type="checkbox" style="display: none;"/>
                            <label class="cbx" for="cbx"><span><svg width="12px" height="9px" viewbox="0 0 12 9"><polyline points="1 5 4 8 11 1"></polyline></svg></span><span>Remember me</span></label></div>
                        <div class="text-center"><input type="submit" class="btn btn-primary" value="LOGIN NOW"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection