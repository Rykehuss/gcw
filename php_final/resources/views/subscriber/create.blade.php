@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Subscriber</b></div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => ['subscriber.store', $bunch_id], 'method' => 'POST']) !!}
        @include('subscriber._form')
        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    @include('layouts.validation_errors')

@endsection