<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function renderCreate(){
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count()==0 || $tags->count()==0){
            Session::flash('info','Please create some post category or tag at first');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[

            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'

        ]);
        
        $featured = $request->featured;
        $newNameOfImage  = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$newNameOfImage);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$newNameOfImage,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success','Post created successfully');
        return redirect()->route('post.rendercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Your post has been restored');
        return redirect()->route('post.index');
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
        $post = Post::find($id);
        return view('admin.posts.edit')
                                    ->with('post',$post)
                                    ->with('categories',Category::all())
                                    ->with('tags',Tag::all());
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
        $this->validate($request,[

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        
        $post = Post::find($id);
        $featured = $request->featured;
        if($featured){
            $newNameOfImage  = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$newNameOfImage);
            $post->featured = 'uploads/posts/'.$newNameOfImage;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        Session::flash('success','Your post has been successfully edited');
        return redirect()->route('post.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post successfully deleted');
        return redirect()->back();
    }
     public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function parmanentDelete($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post parmanently deleted');
        return redirect()->back();
    }
}
