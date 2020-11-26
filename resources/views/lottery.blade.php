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
                    <div class="text-center wheel"><img src="images/depositphotos_53623803-stock-photo-lottery-scratch-ticket.jpg" alt=""></div>
                    <div class="btn-wrapper">
                        <div class="row">
                            <div class="col-md-4 align-self-center text-center">Lottery Prize<strong>1,829 Coins</strong></div>
                            <div class="col-md-4 text-center align-self-center"><a href="#" class="btn btn-primary">BUY now</a></div>
                            <div class="col-md-4 align-self-center text-center">Sold Tickets<strong>236 tickets</strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="number-block">
                <div class="row">
                    <div class="col-md-3 mb-4"><span>73-215-72-130-94</span></div>
                    <div class="col-md-3 mb-4"><span>73-215-72-130-94</span></div>
                    <div class="col-md-3 mb-4"><span>73-215-72-130-94</span></div>
                    <div class="col-md-3 mb-4"><span>73-215-72-130-94</span></div>
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

            <div class="text-center pt-4"><p>To join the lottery, purchase tickets by click on Buy a Ticket. With every purchased ticket you have an extra chance to win the lottery and also the lottery award is increased. There is a lottery every week and is ended at every Saturday, at 23:59. If you win the lottery, you will receive your prize instantly after the end of the round. Every lottery ticket costs 10.00 coins.</p></div>

        </div>
    </div>
@endsection