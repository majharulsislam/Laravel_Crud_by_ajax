<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.posts.post');
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
        $data = new Post();
        $data->title = $request->title;
        $data->author = $request->author;
        $data->details = $request->details;
        $data->save();
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
        return $post;
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
        return $post;
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
        $data = Post::find($id);
        $data->title = $request->title;
        $data->author = $request->author;
        $data->details = $request->details;
        $data->save();

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
        if(!is_null($post)){
            $post->delete();
        }
    }

    // Ajax ar maddhome datapass from database
    public function allpost()
    {
        $post = Post::all();
        return datatables()->of($post)
            ->addColumn('action', function($post){
                return '<a onclick="showData('.$post->id.')" class="btn btn-sm btn-success">Show</a>'.
                '<a onclick="editForm('.$post->id.')" class="btn btn-sm btn-info">Edit</a>'.
                '<a onclick="deleteData('.$post->id.')" class="btn btn-sm btn-danger">Delete</a>';
            })->make(true);
    }

}
