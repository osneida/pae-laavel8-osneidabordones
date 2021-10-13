<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categorias = HTTP::get('http://apibase/admin/categories');
        $categoriasArr = $categorias->json();  // json_decode($categorias); //->json(); //  getBody()->getContents();
 
        return view('admin.categories.index', compact('categoriasArr'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $categoria = $request->all();
        $categorias = HTTP::post('http://apibase/admin/categories',$categoria);

        if($categorias){
           // return $categorias; 
            return redirect()->route('admin.categories.index')->with('info','La categoría se creó con éxito');
        }
        else{
            return 'no guardó nada'; 
        }

       // 
    }

    public function edit($id)
    {
        $categoriaData = HTTP::get('http://apibase/admin/categories/'.$id);
        $categorias = $categoriaData->json();
        $category=$categorias["data"];

        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $category =   $request->all();
        $categorias = HTTP::put('http://apibase/admin/categories/'.$id, $category);

        return redirect()->route('admin.categories.index')->with('info','La categoría se modificó con éxito');;
    }


    public function destroy($id)
    {
        $categorias = HTTP::delete('http://apibase/admin/categories/'.$id);

        return redirect()->route('admin.categories.index')->with('info','La categoría se eliminó con éxito');
    }
}
