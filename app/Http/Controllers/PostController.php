<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\PostDetail;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_name' => 'required | string',
            'user_img' => 'url',
            'post_txt' => 'string',
            'post_img' => 'url',
            'post_date' => 'date'
        ]);

        // $data = $request->all();

        // $newPost = new Post;
        // $newPost->user_name = $data['user_name'];
        // $newPost->user_img = $data['user_img'];
        // $newPost->post_txt = $data['post_txt'];
        // $newPost->post_img = $data['post_img'];
        // $newPost->post_date = $data['post_date'];
        // $newPost->save();
        $post = new Post();
        $postDetail = new PostDetail();
        $this->saveItemFromRequest($post, $postDetail, $request);
        return redirect()->route('posts.show', $post);
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
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostDetail $postDetail, Post $post)
    {
        $request->validate([
            'user_name' => 'string',
            'user_img' => 'url',
            'post_txt' => 'string',
            'post_img' => 'url',
            'post_date' => 'date'
        ]);

        // $data = $request->all();
        // $post->update($data);
        $this->saveItemFromRequest($post, $postDetail, $request);
        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    private function saveItemFromRequest(Post $post, PostDetail $postDetail, Request $request) {

        $data = $request->all(); // data = array

        $postDetail->platform = $data['platform'];
        $postDetail->tag = $data['tag'];
        $postDetail->save();

        $post->user_name = $data['user_name'];
        $post->user_img = $data['user_img'];
        $post->post_txt = $data['post_txt'];
        $post->post_img = $data['post_img'];
        $post->post_date = $data['post_date'];
        $post->post_detail_id = $postDetail->id;
        $post->save();
    }
}
