@extends('layouts.master')

@section('customScripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tickets').DataTable();
        });
    </script>
@endsection

@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Panel heading</div>
        <div class="panel-body">
            <p>Enjoy :)</p>
        </div>

        @if(!is_null($tickets))
                <!-- Table -->
        <table id="tickets" class="table table-bordered table-responsive tab-content table-hover" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>title</th>
                <th>body</th>
                <th>user</th>
                <th>status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td><a href="{{ route('ticket.show',$ticket->id) }}">{{ $ticket->title }}</a></td>
                    <td>{{ $ticket->body }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ ($ticket->closed) ? 'closed' : 'pending' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i>"> there are no tickets to show ..
                please <a href="{{ route('ticket.create') }}">create a ticket</a></div>
        @endif
    </div>
@endsection