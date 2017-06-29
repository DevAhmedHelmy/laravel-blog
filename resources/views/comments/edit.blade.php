@extends('main')
@section('title',"Edit Comment")
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {{ Form::Model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT']) }}
                {{ Form::label('name','Name:') }}
                {{ Form::text('name',NULL,['class'=>'form-control','disabled'=>'']) }}

                {{ Form::label('email','Email:') }}
                {{ Form::email('email',NULL,['class'=>'form-control','disabled'=>'']) }}

                {{ Form::label('comment','Comment:') }}
                {{ Form::textarea('comment',NULL,['class'=>'form-control']) }}

                {{ Form::submit('Save Change',['class'=>'btn btn-success','style'=>'margin-top:20px']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection