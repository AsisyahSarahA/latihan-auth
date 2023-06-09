<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view ('category.index', compact('categories'));
    } 

    public function create(){
        return view('category.create');
    }
    public function store(Request $request){
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/dashboard/category');
        return view ('category.index');
    }

    public function edit(){
        $categories = Category::all();
        return view('category.edit',compact('categories'));
    }

    public function update($id){
        $categories = Category::find($id);
        $categories->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redireact ('/dashboard/category');

    }
    

    public function destroy($id) {
        $categories = Category::find($id);
        $category = Category::where('id',$id)->delete();

        return redirect('/dashboard/category');
    }
}
