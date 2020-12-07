@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">YoutubeWatch Tickets</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>USERNAME</th>
                            <th>AMOUNT</th>
                            <th>DOLLAR</th>
                            <th>PAYMENT</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $index => $withdrawal)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $withdrawal->user->name }}</td>
                                    <td>{{ $withdrawal->amount }}</td>
                                    <td>{{ $withdrawal->amount / 100 * 0.03 }}</td>
                                    <td>{{ $withdrawal->payment }}</td>
                                    <td>{{ $withdrawal->description }}</td>
                                    <td>{{ $withdrawal->status }}</td>
                                    <td>
                                        @if($withdrawal->status != "completed")
                                            <button class="btn btn-danger" onclick="processWithdrawal({{ $withdrawal->id }})"><i class="fa fa-dollar"></i> Mark As Completed</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="form-withdrawal-process" action="{{ route('admin.withdrawal.process') }}" method="post">
        @csrf
        <input type="hidden" id="withdrawal-id" name="withdrawal">
    </form>
@endsection

@push('scripts')
    <script>
        function processWithdrawal(withdrawal) {
            $('#withdrawal-id').val(withdrawal);
            $('#form-withdrawal-process').submit();
        }

        $(function () {
            $('#table').DataTable();
        });
    </script>
@endpush