@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>WITHDRAW MONEY</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            @include('profile.dashboard-top')

            <div class="lucky-wrapper">
                <div class="block-content">
                    <div class="text-center wheel"><img src="images/depositphotos_155813190-stock-illustration-fortune-wheel-icon.jpg" alt=""></div>
                    <div class="btn-wrapper text-center">
                        <p>Total Winnings : 6,280 coins and 57 VIP Days</p>
                        <a href="#" class="btn btn-primary">SKIP NOW</a>
                    </div>
                </div>
            </div>


            <div class="row black-box">
                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="box">
                        <div class="media mb-4"><span class="media-body">Mj_rara</span><a href="#" class="btn btn-primary">2 VIP Days</a></div>
                        <div class="text-center mt-3">12 Nov 2020 01:49</div>
                    </div>
                </div>

            </div>

            <div class="text-center pt-4"><p>Do you feel lucky? Click on Spin and find out how much luck you have, by winning an amazing prize. To spin the wheel you have to pay 40 coins</p></div>

        </div>
    </div>
@endsection