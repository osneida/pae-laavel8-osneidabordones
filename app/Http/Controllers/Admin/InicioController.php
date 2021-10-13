<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class InicioController extends Controller
{
    public function index()
    {
        $categorias = Http::get('http://apibase/admin/categories');
        $categoriasArr = $categorias->json(); 
 
        $post = Http::get('http://apibase/admin/posts');
        $postArr = $post->json(); 

        return view('welcome', compact('categoriasArr','postArr'));
    }
}
