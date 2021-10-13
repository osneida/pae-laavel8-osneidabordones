<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index() {
        
        return view('admin.posts.index');
    }

    public function create()
    {

        $categories = Category::orderBy('name')->pluck('name','id');
        $tags = Tag::all(); //orderBy('name')->

        return view('admin.posts.create', compact('categories','tags'));

    }

    public function store(PostRequest $request)    {
        try {

            $post = Post::create($request->all());

            if($request->tags){
                $post->tags()->attach($request->tags);
            }

            return redirect()->route('admin.posts.index')->with('info','El Post se creo con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','La categoría No se creo');

        }

    }

    public function edit(Post $post){

        $this->authorize('author', $post);

        $categories = Category::orderBy('name')->pluck('name','id');
        $tags = Tag::all(); //orderBy('name')->

        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post) {

        try {
            
            $this->authorize('author', $post);
            $post->update($request->all());

            if($request->tags){
                $post->tags()->sync($request->tags);
            }

            return redirect()->route('admin.posts.index')->with('info', 'el Post se modificó con éxito');
            
        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','El Post No se modifico');

        }
    }

    public function destroy(Post $post)   {

        try {

            $this->authorize('author', $post);
            $post->delete();

            return redirect()->route('admin.posts.index')->with('info','El Post se eliminó con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.posts.index')->with('info','El Post No se pudo eliminaar');

        }
    }
}
