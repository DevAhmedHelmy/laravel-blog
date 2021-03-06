@extends('main')
@section('title','Forgot my Password')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                
                    {{ Form::open(['url'=>'password/reset']) }}

                        {{ Form::hidden('token',$token) }}

                        {{ Form::label('email','Email Address:') }}
                        {{ Form::email('email',$email,['class'=>'form-control']) }}

                        {{ Form::label('password','New Passsword:') }}
                        {{ Form::password('password',['class'=>'form-control']) }}

                        {{ Form::label('password_confirmation','Connfirm New Passsword:') }}
                        {{ Form::password('password_confirmation',['class'=>'form-control']) }}

                        {{ Form::submit('Reset Pasword',['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
             </div>
        </div>
    </div>
@endsection