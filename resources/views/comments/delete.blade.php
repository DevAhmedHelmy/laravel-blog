@extends('main')
@section('title',"Delete Comment")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Delete Comment</h1>
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br />
                <strong>Email:</strong> {{ $comment->email }}<br />
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>  
            {{ Form::Model($comment,['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) }}
                {{ Form::submit('YES DELETE THIS COMMENT',['class'=>'btn btn-danger btn-block','style'=>'margin-top:20px']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection