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

            <div class="video-list-table">
                <h4>Promoted Videos</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Video</th>
                            <th>Remaining Views</th>
                            <th>Received View</th>
                            <th>Today Views</th>
                            <th> Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Video</td>
                            <td>Remaining Views</td>
                            <td>Received View</td>
                            <td>Today Views</td>
                            <td> Status</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="video-list-table">
                <h4>Pending Videos</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Video</th>
                            <th>Views</th>
                            <th>Daily Limit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Video</td>
                            <td>Views</td>
                            <td>Today Views</td>
                            <td> Action</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center"><p>If you already paid for your Website Ad, but is still pending after few minutes, please contact us!</p></div>

        </div>
    </div>
@endsection