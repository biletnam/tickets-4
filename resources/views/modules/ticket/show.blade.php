@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{!! asset('uploads/'.$ticket->img_url) !!}" alt="{{ $ticket->title }}">
                <div class="caption">
                    <p>Status :
                        <button class="btn {{ ($ticket->closed) ? 'btn-danger': 'btn-warning'}}">
                            {{ ($ticket->closed) ? 'closed': 'pending'}}
                        </button>
                    </p>
                    <h3>{{ $ticket->title }}</h3>
                    <p>{{ $ticket->body }}</p>
                </div>
                <a class='btn btn-primary btn-sm' href="{{ route('ticket.edit',$ticket->id) }}">Edit</a>
                @if(!$ticket->closed)
                    <a class="btn btn-warning" href="{{ route('ticket.change',[$ticket->id,1]) }}"><i class="fa fa-times fa-lg"></i>Close Ticket</a>
                    @else
                    <a class="btn btn-success" href="{{ route('ticket.change',[$ticket->id,0]) }}"><i class="fa fa-magic fa-lg"></i>Reopen Ticket</a>
                @endif
            </div>
        </div>
    </div>
@endsection