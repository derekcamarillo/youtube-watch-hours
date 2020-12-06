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
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>MESSAGE</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $index => $ticket)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->email }}</td>
                                    <td>{{ $ticket->message }}</td>
                                    <td>
                                        @if($ticket->status == "unread")
                                        <button class="btn btn-danger" onclick="readMessage({{ $ticket->id }})"><i class="fa fa-envelope-open"></i> Mark As Read</button>
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

    <form id="form-ticket-read" action="{{ route('admin.tickets.read') }}" method="post">
        @csrf
        <input type="hidden" id="ticket-id" name="ticket">
    </form>
@endsection

@push('scripts')
    <script>
        function readMessage(ticket) {
            $('#ticket-id').val(ticket);
            $('#form-ticket-read').submit();
        }

        $(function () {
            $('#table').DataTable();
        });
    </script>
@endpush