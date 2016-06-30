@if(isset($ticket))
    {!! Form::model($ticket,['route' => ['ticket.update',$ticket->id],'method'=>'PATCH','files' => 'true','class' => 'form-horizontal']) !!}
@else
    {!! Form::open(['route' => 'ticket.store','method'=>'POST','files' => 'true','class'=>'form-horizontal']) !!}
@endif
<fieldset>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="title">title</label>
        <div class="col-md-4">
            {!! Form::text('title',old('title'),['class' => 'form-control input-md', 'placeholder'=> 'enter your title
            here ..']) !!}
            {{ Form::hidden('user_id',Auth::id()) }}

        </div>
    </div>

    @if(Request::route()->getName() === 'ticket.edit')
            <!-- Multiple Checkboxes -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Close Ticket : </label>
        <div class="col-md-4">
            <div class="checkbox">
                <label for="checkboxes-1">
                    {{ Form::radio('closed',1,($ticket->closed) ? $ticket->closed : null) }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Reopen Ticket : </label>
        <div class="col-md-4">
            <div class="checkbox">
                <label for="checkboxes-1">c
                    {{ Form::radio('closed',0, ($ticket->closed) ? $ticket->closed : null) }}
                </label>
            </div>
        </div>
    </div>
    @endif

            <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Text Area</label>
        <div class="col-md-4">
            {{ Form::textarea('body',old('body'),['class' => 'form-control']) }}
        </div>
    </div>

    <!-- File Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="filebutton">File Button</label>
        <div class="col-md-4">
            <input id="img_url" name="img_url" class="input-file" type="file">
        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="button1id">Double Button</label>
        <div class="col-md-8">
            {{ Form::submit('submit',['class' => 'btn btn-success']) }}
            <button href="{{ route('ticket.index') }}" class="btn btn-danger">Cancel</button>
        </div>
    </div>

</fieldset>
{!! Form::close() !!}
