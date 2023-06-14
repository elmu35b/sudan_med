<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{



    function index() : mixed {
        $categories = Category::paginate(25);
        return view('admin.categories.index',compact('categories'));
    }

    function show(Category $category) : mixed {
        $medicines = Medicine::where('category_id',$category->id)->paginate(25);
        return view('admin.categories.show',compact('category','medicines'));
    }

    function create() : mixed {
        return view('admin.categories.create',);
    }
    function save(Request $request) : mixed {
        // return $request;
        $request->validate(['name'=> 'required']);
       $category = new Category($request->all());
       $category->desc = $request->desc;
       $category->save();
       Session::flash('created',true);
       return redirect()->back();
    }

    function delete(Category $category) : mixed {
        $category->delete();
        return redirect()->back();
    }
}
