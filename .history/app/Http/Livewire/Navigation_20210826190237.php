<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http; 
use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {
        $categorias = HTTP::get('http://apibase/admin/categories');
        $categoriasArr = $categorias->json(); 
        return view('livewire.navigation', compact('categoriasArr'));
    }
}
