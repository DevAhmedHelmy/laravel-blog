@extends('main')
@section('title',"{$post->title}")@section('stylesheet')
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
            <img src="{{ asset('images/'.$post->image) }}" alt="no image" width="800" />
            <h1>{{$post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comment-title">
                <span class="glyphicon glyphicon-comment"></span> 
                {{ $post->comments()->count() }} Comments
            </h3>
            @if(count($post->comments)>0)
               @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                        <img src="https://www.gravatar.com/avatar/{!! md5(strtolower(trim($comment->email))) !!}?s=50&d=wavatar" alt="" class="author-image">
                            <div class="author-name">
                                <h4>{{ $comment->name }}</h4>
                                <p class="author-time">{{ date('F nS, Y - g:ia',strtotime($comment->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {!! $comment->comment !!}
                        </div>
                    </div>
               @endforeach
            @else
                <p>No Comment Found</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:50px">
            {{ Form::open(['route'=>['comments.store',$post->id]]) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','Name:') }}
                        {{ Form::text('name',NULL,['class'=>'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email','Email:') }}
                        {{ Form::email('email',NULL,['class'=>'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        {{ Form::label('comment','Comment:') }}
                        {{ Form::textarea('comment',NULL,['class'=>'form-control','rows'=>'5']) }}

                        {{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block','style'=>'margin-top:25px']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection