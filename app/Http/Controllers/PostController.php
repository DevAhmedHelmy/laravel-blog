<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Auth;
use Session;
use Purifier;

class PostController extends Controller
{
    /**
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog post in it from the datacase
        $posts=Post::orderBy('id','DESC')->paginate(10);
        //return a view and post in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesdropdown=Category::dropdown();
        $tagsdropdown=Tag::dropdown();
        return view('posts.create')->withCategoriesdropdown($categoriesdropdown)->withTagsdropdown($tagsdropdown);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,array(
            'title'=>'required|string|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ));

        $user = User::find(Auth::user()->id);

        //store in database
        $post=new Post();
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=Purifier::clean($request->body);

        $post->user()->associate($user);

        $post->save();

        $post->tags()->sync($request->tags,FALSE);//wheter to override the extisting association

        Session::flash('success','The blog post was successfully save!');

        //redirect to another page
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post=Post::find($id);

        if(Auth::user()->id !== $post->user_id){
            return redirect()->route('posts.index');
        }

        $categoriesdropdown=Category::dropdown();
        $tagsdropdown=Tag::dropdown();
        //return the view and post in the var we previouly created
        return view('posts.edit')->withPost($post)->withCategoriesdropdown($categoriesdropdown)->withTagsdropdown($tagsdropdown);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $slugUniqueValdation='|unique:posts,slug';

            $post=Post::find($id);

            if(Auth::user()->id !== $post->user_id){
                return redirect()->route('posts.index');
            }

            if($post->slug == $request->slug){
                $slugUniqueValdation='';
            }
            
            // validate the data
            $this->validate($request,array(
                'title'=>'required|string|max:255',
                'slug'=>'required|alpha_dash|min:5|max:255'.$slugUniqueValdation,
                'category_id'=>'required|integer',
                'body'=>'required'
            ));

            //save the data to the database
            $post->title=$request->input('title');
            $post->body=Purifier::clean($request->input('body'));
            $post->category_id=$request->input('category_id');
            $post->slug=$request->input('slug');
            $post->save();

            $post->tags()->sync($request->tags);//wheter to override the extisting association //2ns param default TRUE

            // set flash with success message
            Session::flash('success','Post Updated!');

            // redirect with flash data to posts.show
            return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        if(Auth::user()->id !== $post->user_id){
            return redirect()->route('posts.index');
        }

        //delete data related
        $post->tags()->detach();

        $post->delete();
        Session::flash('success','The post successfully deleted!');
        return redirect()->route('posts.index');
    }
}
