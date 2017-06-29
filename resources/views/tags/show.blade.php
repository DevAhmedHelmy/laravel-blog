@extends('main')
@section('title',"{$tag->name}")
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-2">
            {{ Html::linkRoute('tags.edit','Edit Tag',[$tag->id],['class'=>'btn btn-primary pull-right btn-block','style'=>'margin-top:20px']) }}
        </div>
        <div class="col-md-2">
            {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) }}
                {{ Form::submit('Delete Tag',['class'=>'btn btn-danger btn-block','style'=>'margin-top:20px']) }}
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(count($tag->posts)>0)
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    <tbody> 
                        @foreach($tag->posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title}}</td>
                                <td>
                                    @foreach($post->tags as $tag_)
                                        <span class="label label-default">
                                            {{ $tag_->name }}
                                        </span>&nbsp;
                                    @endforeach
                                </td>
                                <td>{{ Html::linkRoute('posts.show','View Post',[$post->id],['class'=>'btn btn-default btn-sm']) }}</td>
                            </tr>
                        @endforeach                    
                    </tbody>
                </table>
            @else
                <p>No Post Found</p>
            @endif
        </div>
    </div>
@endsection