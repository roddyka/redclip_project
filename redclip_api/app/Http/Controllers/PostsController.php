<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Event;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts  = Posts::orderBy('created_at','DESC')->get();
        return response()->json($Posts);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function getPost($id)
    {
        $Posts  = Posts::find($id);
        return response()->json($Posts);
    }

    public function getComments($id)
    {
        $Posts  = Posts::where('id_post', $id)->orderBy('created_at','DESC')->get();
        return response()->json($Posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $Posts = Posts::create($request->input());
        return response()->json($Posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function editPost(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        $Posts  = Posts::find($id);
        $Posts->id_post = $request->input('id_post');
        $Posts->title = $request->input('title');
        $Posts->content = $request->input('content');
        $Posts->image_url = $request->input('image_url');
        $Posts->like = $request->input('like');
        $Posts->dislike = $request->input('dislike');
        $Posts->save();
   
        return response()->json($Posts);
    }

    // public function updateLike(Request $request, $id)
    // {
    //     $Posts  = Posts::find($id);
    //     $Posts->like = $request->input('like');
    //     $Posts->save();
   
    //     return response()->json($Posts);
    // }

    // public function updateDislike(Request $request, $id)
    // {
    //     $Posts  = Posts::find($id);
    //     $Posts->like = $request->input('dislike');
    //     $Posts->save();
   
    //     return response()->json($Posts);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroyPost(posts $id)
    {
        $Posts  = Posts::find($id);
        $Posts->delete();
        return response()->json('deleted');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        //
    }
}
