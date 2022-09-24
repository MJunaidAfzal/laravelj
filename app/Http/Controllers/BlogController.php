<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
=======
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
>>>>>>> 977aa7705b538266a30dd6b10d9798d0ef515577

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
            'category_id' => $request->category_id,
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
