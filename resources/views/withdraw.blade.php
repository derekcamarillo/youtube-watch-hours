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

            <div class="withdraw-form">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Coins Amount"><span>You will receive $1.00</span></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" placeholder="Payment Method"></div>
                        <div class="col-md-12 mb-4"><textarea type="text" class="form-control" placeholder="Payment Info"></textarea></div>
                    </div>
                    <div class="text-center"><input type="submit" class="btn btn-primary" value="Register Now"></div>
                </form>
            </div>

            <div class="withdraw-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Converted Coins</th>
                            <th>Money</th>
                            <th>Payment Method </th>
                            <th>Payment Info</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Converted Coins</td>
                            <td>Money</td>
                            <td>Payment Method </td>
                            <td>Payment Info</td>
                            <td>Status</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection