
@extends('main')
@section('title','Homepage')
@section('content')
        <div class="row">
            <div class="col-md-12"> 
                <div class="jumbotron">
                    <h1>Welcome to My Blog!</h1>
                    <p class="lead">Thank you for visiting.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Latest Post</a></p>
                </div>
            </div>
        </div>

        <div class="row">
        
            <div class="col-md-8">
                <div class="post">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae explicabo, eveniet magnam molestias aut sed praesentium nisi maxime temporibus ipsam, vel molestiae architecto, voluptates id porro natus rem beatae. Assumenda.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <hr>
                <div class="post">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae explicabo, eveniet magnam molestias aut sed praesentium nisi maxime temporibus ipsam, vel molestiae architecto, voluptates id porro natus rem beatae. Assumenda.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <hr>
                <div class="post">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae explicabo, eveniet magnam molestias aut sed praesentium nisi maxime temporibus ipsam, vel molestiae architecto, voluptates id porro natus rem beatae. Assumenda.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
                <hr>
                <div class="post">
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae explicabo, eveniet magnam molestias aut sed praesentium nisi maxime temporibus ipsam, vel molestiae architecto, voluptates id porro natus rem beatae. Assumenda.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
             </div>


            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
        </div>
@endsection