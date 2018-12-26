<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function renderCreate(){
        return view('admin.posts.create')->with('categories',Category::all());
    }

    public function create(Request $request)
    {
        
        $this->validate($request,[

            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'

        ]);
        
        $featured = $request->featured;
        $newNameOfImage  = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$newNameOfImage);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts'.$newNameOfImage,
            'category_id' => $request->category_id
        ]);
        Session::flash('success','Post created successfully');
        return redirect()->route('post.rendercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
