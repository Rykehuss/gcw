@extends('layouts.panel')

@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('post.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
        </div>
    </div>

    <div class="panel-body">

        <h1>You can't create new post!</h1>
        <p>Only registered users can create new posts.</p>
        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('register')}}">
            <i class="fa fa-backward" aria-hidden="true"></i> Register
        </a>
    </div>
@endsection