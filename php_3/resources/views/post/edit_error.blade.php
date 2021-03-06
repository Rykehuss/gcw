@extends('layouts.panel')

@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('post.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">post: <b>{{$post->message}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['post.destroy', $post->id], 'method' => 'DELETE'])}}
                    {{ link_to_route('post.edit', 'edit', [$post->id], ['class' => 'btn btn-primary btn-xs']) }} |
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">

        <h1>You can't edit this post!</h1>
        <p>Only authors and admin can edit posts.</p>
        <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('post.index')}}">
            <i class="fa fa-backward" aria-hidden="true"></i> Ok
        </a>
    </div>
@endsection