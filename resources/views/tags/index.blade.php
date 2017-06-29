@extends('main')
@section('title','Tags')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            @if(count($tags)>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ Html::linkRoute('tags.show',$tag->name,[$tag->id]) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Tag Found</p>
            @endif
        </div>

        <div class="col-md-3">
            <div class="well">
                {{ Form::open(['route'=>'tags.store']) }}
                    <h2>New Tag</h2>
                    {{ Form::label('name','Name:') }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}

                    {{ Form::submit('Create New Tag',['class'=>'btn btn-primary btn-block btn-h1-spacing']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection