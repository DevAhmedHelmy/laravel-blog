@extends('main')
@section('title','Contact Me')
@section('stylesheet')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
            tinymce.init({
                selector: 'textarea',  // change this value according to your HTML
                plugins: 'link code',
                menubar: false
            });
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
         <hr>
         {{ Form::open(['route'=>'contact']) }}
            <div class="form-group">
                {{ Form::label('email','Email:') }}
                {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
            </div>
            <div class="form-group">
                {{ Form::label('subject','Subject:') }}
                {{ Form::text('subject',null,['class'=>'form-control','placeholder'=>'Subject']) }}
            </div>
            <div class="form-group">
                {{ Form::label('message','Messsage:') }}
                {{ Form::textarea('message',null,['class'=>'form-control','placeholder'=>'Type your message here....']) }}
            </div>
            {{ Form::submit('Send Message',['class'=>'btn btn-success']) }}

         {{ Form::close() }}
         </div>
    </div>
@endsection