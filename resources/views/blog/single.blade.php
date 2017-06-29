@extends('main')
@section('title',"{$post->title}")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($post->comments)>0)
               @foreach($post->comments as $comment)
                    <div class="comment">
                        <p><strong>Name:</strong> {{ $comment->name }}</p>
                        <p><strong>Comment:</strong><br />{{ $comment->comment }}</p>
                        <hr>
                    </div>
               @endforeach
            @else
                <p>No Comment Found</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:50px">
            {!! Form::open(['route'=>['comments.store',$post->id]]) !!}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name',NULL,['class'=>'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email','Email:') }}
                        {{ Form::text('email',NULL,['class'=>'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        {{ Form::label('comment','Comment:') }}
                        {{ Form::textarea('comment',NULL,['class'=>'form-control','rows'=>'5']) }}

                        {{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block','style'=>'margin-top:25px']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection