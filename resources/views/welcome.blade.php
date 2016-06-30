@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        @if(Auth::user())
                            you logged in as {{ Auth::user()->name }}
                            @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
