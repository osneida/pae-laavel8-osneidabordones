<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = HTTP::get('http://apibase/admin/posts');
        $postsArr = $posts->json();

        return view('dashboard', compact('postsArr'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $posts = HTTP::get('http://apibase/admin/posts/' . $id);
        $postsArr = $posts->json();

        return view('posts.show', compact('postsArr'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function category($id){
        $postsCategorias = HTTP::get('http://apibase/admin/posts/categories/'.$id);
        $postsCategoriasArr = $postsCategorias->json();
 
        return view('posts.category', compact('postsCategoriasArr'));
    }


}
