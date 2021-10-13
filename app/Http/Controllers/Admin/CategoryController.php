<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    public function index(): View {

        $categorias = Category::orderBy('name')->paginate(10);
 
        return view('admin.categories.index', compact('categorias'));
    }

    public function create()
    {

        return view('admin.categories.create');

    }

    public function store(CategoryRequest $request)    {
        try {

            Category::create($request->all());

            return redirect()->route('admin.categories.index')->with('info','La categoría se creo con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.categories.index')->with('info','La categoría No se creo');

        }

    }

    public function edit(Category $category ){

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category) {

        try {
            
            $category->update($request->all());
            return redirect()->route('admin.categories.index')->with('info', 'La categoría se modificó con éxito');
            
        } catch(\Exception $exception){

            return redirect()->route('admin.categories.index')->with('info','La categoría No se modifico');

        }
    }


    public function destroy(Category $category)   {

        try {

            $category->delete();

            return redirect()->route('admin.categories.index')->with('info','La categoría se eliminó con éxito');

        } catch(\Exception $exception){

            return redirect()->route('admin.categories.index')->with('info','La categoría No se pudo eliminaar');

        }
    }
}
