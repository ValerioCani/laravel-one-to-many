<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'title'=>'required|max:255',
            'content'=>'required|max:65535'
        ]);
        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = $this->SlugCreator($data);
        $post->save();

        return redirect()->route('admin.posts.index')->with('status', 'Post creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required|max:65535'
        ]);

        $data=$request->all();
        if($data['title'] !== $post->title){
            $data['slug'] = $this->SlugCreator($data);
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Post modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);
        return redirect()->route('admin.posts.index')->with('status', 'Post cancellato con successo');
    }

    protected function SlugCreator($data){

        $slug = Str::slug($data['title'], '-');
        $slugcheck = Post::where('slug', $slug)->first();
        $counter = 2;
        while($slugcheck){
            $slug = Str::slug($data['title'] . '-' . $counter, '-');
            $slugcheck = Post::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
