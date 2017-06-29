@extends('main')
@section('title','Create New Post')
@section('stylesheet')
    {{ Html::style('css.parsley.css') }}
    {{ Html::style('css.select2.min.css') }}

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
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {{ Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) }}

                {{ Form::label('title','Title:') }}
                {{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>"255")) }}

                {{ Form::label('slug','Slug:') }}
                {{ Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>"5",'maxlength'=>"255")) }}

                {{ Form::label('category_id','Category:') }}
                {{ Form::select('category_id',$categoriesdropdown, null, ['placeholder' => 'Pick a size...','class'=>'form-control']) }}

                {{ Form::label('tags','Tags:') }}
                {{ Form::select('tags[]',$tagsdropdown, null, ['class'=>'form-control select2-multi','multiple'=>'multiple']) }}

                {{ Form::label('body','Body:') }}
                {{ Form::textarea('body',null,array('class'=>'form-control')) }}

                {{ Form::submit('Create Post',array('class'=>'btn btn-success btn-block','style'=>'margin-top:20px')) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('js.select2.min.js') }}
    {{ Html::script('js.parsley.min.js') }}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
@endsection