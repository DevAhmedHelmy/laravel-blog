@extends('main')
@section('title',"Edit Tag")
@section('content')
    <div class="row">
        {{ Form::Model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) }}
            {{ Form::label('name','Name:') }}
            {{ Form::text('name',NULL,['class'=>'form-control']) }}

            {{ Form::submit('Save Change',['class'=>'btn btn-success','style'=>'margin-top:20px']) }}
        {{ Form::close() }}
    </div>
@endsection