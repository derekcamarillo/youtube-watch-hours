@extends('layouts.main')

@section('content')
    <div class="header-bar"></div>

    <div class="section">
        <div class="container">
            <div class="page-title mb-5">
                <h1>WITHDRAW MONEY</h1>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

                @if(session()->has('success'))
                    <p>{{ session('success') }}</p>
                @endif
            </div>

            @include('profile.dashboard-top')

            <div class="withdraw-form">
                <form action="{{ route('withdraw') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input type="number" class="form-control" id="amount" name="amount" min="40" max="{{ Auth::user()->coin }}" placeholder="Coins Amount"><span>You will receive $<strong id="esti">0.00</strong></span></div>
                        <div class="col-md-6 mb-4"><input type="text" class="form-control" name="payment" placeholder="Payment Method"></div>
                        <div class="col-md-12 mb-4"><textarea type="text" class="form-control" name="description" placeholder="Payment Info"></textarea></div>
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
                            @foreach($withdrawals as $index => $withdrawal)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $withdrawal->amount }}</td>
                                    <td>{{ $withdrawal->amount / 100 * 0.03 }}</td>
                                    <td>{{ $withdrawal->payment }}</td>
                                    <td>{{ $withdrawal->description }}</td>
                                    <td>{{ \Illuminate\Support\Str::ucfirst($withdrawal->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#amount').on('change', function () {
            amount = $(this).val();
            $('#esti').text(amount / 100 * 0.03);
        });
    </script>
@endpush