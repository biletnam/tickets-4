@extends('layouts.master')


@section('content')
    <form class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <legend>Form Name</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Text Input</label>
                <div class="col-md-4">
                    <input id="textinput" name="title" type="text" placeholder="placeholder" class="form-control input-md">
                    
                </div>
            </div>

            @if(Request::route()->getName() == 'ticket.edit')
            <!-- Multiple Checkboxes -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="checkboxes">Multiple Checkboxes</label>
                <div class="col-md-4">
                    <div class="checkbox">
                        <label for="checkboxes-0">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Option one
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="checkboxes-1">
                            <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                            Option two
                        </label>
                    </div>
                </div>
            </div>
            @endif

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textarea">Text Area</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="textarea" name="body">default text</textarea>
                </div>
            </div>

            <!-- File Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">File Button</label>
                <div class="col-md-4">
                    <input id="filebutton" name="myfile" class="input-file" type="file">
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id">Double Button</label>
                <div class="col-md-8">
                    <button id="button1id" name="button1id" class="btn btn-success">Good Button</button>
                    <button id="button2id" name="button2id" class="btn btn-danger">Scary Button</button>
                </div>
            </div>

        </fieldset>
    </form>

@endsection