<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search; 

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::with(["user","category"])
                ->where('user_id', auth()->user()->id)
                ->where('name','like','%'.$this->search.'%')
                ->latest('id')
                ->paginate(5); 

        return view('livewire.admin.post-index', compact('posts'));
    }
}
