@extends('main')
@section('title','View Post')
@section('stylesheet')
    {!! Html::style('css.parsley.css') !!}
@endsection
@section('content')

    <div class="row">
        {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','data-parsley-validate'=>'']) !!}
            <div class="col-md-8">  
                {{ Form::label('title','Title:') }}      
                {{ Form::text('title',null,array('class'=>'form-control input-lg','required'=>'','maxlength'=>"255")) }}

                {{ Form::label('slug','Slug:',['class'=>'form-spaceing-top']) }}      
                {{ Form::text('slug',null,array('class'=>'form-control ','required'=>'','minlength'=>"5",'maxlength'=>"255")) }}

                {{ Form::label('category_id','Category:') }}
                {{ Form::select('category_id',$categoriesdropdown, $post->category_id, ['class'=>'form-control']) }}

                {{ Form::label('body','Body:',['class'=>'form-spaceing-top']) }}
                {{ Form::textarea('body',null,array('class'=>'form-control','required'=>'')) }}
            </div>
            <div class="col-md-4">
                <div class="well">
                    <div class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
                    </div>

                    <div class="dl-horizontal">
                        <dt>Updated At:</dt>
                        <dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}
                        </div>
                    </div>
                </div>
            </div>
         {!! Form::close() !!}
    </div>
@endsection()
@section('script')
    {!! Html::script('js.parsley.js') !!}
@endsection