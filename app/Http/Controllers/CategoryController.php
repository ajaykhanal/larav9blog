<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index');
    }

    public function add(Request $request){
        $cat= new Category;
        $cat->title= $request->title;
        $cat->detail= $request->detail;
        $cat->save();
        return redirect()->back()->with('success',"Category has been added!!");
    }
}
