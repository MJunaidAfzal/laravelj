<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;


class CategoryController extends Controller
{
    public function index(){
        $categories = category::get();
        return view('categories.index' , compact('categories'));
    }
 
    public function create(){
        $users = User::where('role_id',3)->get();
        return view('categories.create' , compact('users'));
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:191|unique:categories,name',
            'blog_name' => 'required|max:191|unique:categories,blog_name',
            'status' => 'required',
        ]);
        $store = Category::create([
            'name' => $request->name,
            'blog_name' => $request->blog_name,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('categories.index')->with('success','Category Added');
        }
        else{
            return redirect()->route('categories.create')->with('error','Something Went Wrong');
        }

        

    }
    public function edit($id){
        $users = User::where('role_id',3)->get();
        $category = Category::where('id',$id)->first();
        return view('categories.edit',compact('category' , 'users'));
    }
    

    public function update(Request $request, $id){
        $request->validate([ 
        'name' => 'required|max:191|:categories,name'.$id,
        'blog_name' => 'required|max:191|:categories,blog_name'.$id,
        'status' => 'required',
    ]);
    $update = Category::where('id',$id)->update([
        'name' => $request->name,
        'blog_name' => $request->blog_name,
        'status' => $request->status,
    ]);
    if($update > 0){
        return redirect()->route('categories.index')->with('success','category update');
    }
    return redirect()->route('categories.index')->with('error','something went wrong');  
    }
    public function delete($id){
        $categories = Category::where('id',$id)->first();
        if(!empty($categories)){
         $categories->delete();
         return redirect()->route('categories.index')->with('success','Category delete');
        }
        return redirect()->route('categories.index')->with('error','record not found');
     }
}
