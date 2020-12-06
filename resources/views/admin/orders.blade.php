@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">YoutubeWatch Orders</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>LINK</th>
                            <th>SECONDS</th>
                            <th>QUANTITY</th>
                            <th>REMAINS</th>
                            <th>STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->link }}</td>
                                    <td>{{ $order->seconds }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->remains }}</td>
                                    <td>{{ $order->status }}</td>
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
        $(function () {
            $('#table').DataTable();
        });
    </script>
@endpush