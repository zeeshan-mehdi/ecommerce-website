<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::all();

        return view('index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'desc'=>'required',
            'image'=>'image|nullable|max:1999'
        ]);

        $nameToStore;
        $path;

        if($request->hasFile('image')){
            $nameWithExtension = $request->file('image')->getClientOriginalName();

            //name

            $fileName = pathinfo($nameWithExtension,PATHINFO_FILENAME);

            //extension

            $extension = $request->file('image')->getClientOriginalExtension();


            $nameToStore = $fileName.'_'.time().'.'.$extension;

            $path= $request->file('image')->storeAs('public/images',$nameToStore);

        }else{
            $nameToStore='noImage.jpg';
        }



        $post = new Post;

        $post->title = $request->input('title');
        $post->description = $request->input('desc');
        $post->price = $request->input('price');
        $post->quantity = $request->input('quantity');
        $post->vendor = $request->input('vender');
        $post->image=$nameToStore;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('post')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
