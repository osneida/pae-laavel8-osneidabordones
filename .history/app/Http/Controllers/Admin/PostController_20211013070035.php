<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
    }

    public function index() {
        
        return view('admin.posts.index');
    }

    public function create()
    {

        $categories = Category::orderBy('name')->all();

        return view('admin.posts.create', compact('categories'));

    }

    public function store(PostRequest $request)    {
        try {

            Post::create($request->all());

            return redirect()->route('admin.posts.index')->with('info','La categoría se creo con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','La categoría No se creo');

        }

    }

    public function edit(Post $post){

        return view('admin.posts.edit', compact('Post'));
    }

    public function update(PostRequest $request, Post $post) {

        try {
            
            $post->update($request->all());
            return redirect()->route('admin.posts.index')->with('info', 'La categoría se modificó con éxito');
            
        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','La categoría No se modifico');

        }
    }


    public function destroy(Post $post)   {

        try {

            $post->delete();

            return redirect()->route('admin.posts.index')->with('info','La categoría se eliminó con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','La categoría No se pudo eliminaar');

        }
    }




}
