<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function create(){
        $categories = Category::get();
        return view('blogs.create',compact('categories'));
    }
  


    public function store(Request $request){
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = "blog-image".'-'.time().$image->getClientOriginalExtension();
            $image->move('uploads/image/blog',$imageName);
        }
        $store = Blog::create([
            'category' => $request->category,
            'blog' => $request->blog,
            'title' => $request->title,
            'image' => $imageName,
            'content' => $request->content,
            'author_id' => auth()->user()->id,
            'status' => 1,
        ]);

        if(!empty($store->id)){
            return redirect()->route('blogs.create')->with('success','Blog Created');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
}
