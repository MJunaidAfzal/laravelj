<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        return view('blogs.index' , compact('blogs'));
    }

    public function create(){
        $categories = Category::get();
        $blogs = Blog::get();
        return view('blogs.create' , compact('categories','blogs'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:191|:blogs,title',
            'category_id' => 'required|max:191|unique:blogs,category_id',
            'short_discription' => 'required|max:191|:blogs,short_discription',
          
        ]);

        if($request->file('blog')){
            $blog = $request->file('blog');
            $blogName = 'blog' . '-' . time() . '.' . $blog->getClientOriginalExtension();
            $blog->move('upload/blog/', $blogName);
        }

        $store = Blog::create([
            'title' =>$request->title,
            'category_id' =>$request->category_id,
            'short_discription' =>$request->short_discription,
            'image' =>$blogName,
            'author_id' => auth()->user()->id,
        ]);

        if(!empty($store->id)){
            return redirect()->route('blogs.index')->with('Success' , 'Blog Added');
        }
        else{
            return redirect()->route('blogs.index')->with('error' , 'something went wrong');
        }
}

    public function edit($id){
        $categories = Category::get();
        $blog = Blog::where('id',$id)->first();
        return view('blogs.edit',compact('categories','blog'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:191|:blogs,title'.$id,
            'category_id' => 'required|max:191|unique:blogs,category_id,'.$id,
            'short_discription' => 'required|max:191|:blogs,short_discription'.$id,
        ]);

        $blogData = Blog::where('id',$id)->first();

        if($request->file('blog')){
            $blog = $request->file('blog');
            $blogName = 'blog' . '-' . time() . '.' . $blog->getClientOriginalExtension();
            $blog->move('upload/blog/', $blogName);
        }
        else{
            $blogName = $blogData->blog;
        }

        $update = Blog::where('id',$id)->update([
            'title' =>$request->title,
            'category_id' =>$request->category_id,
            'short_discription' =>$request->short_discription,
            'image' =>$blogName,
            'author_id' => auth()->user()->id,
        ]);

        if($update > 0){
            return redirect()->route('blogs.index')->with('success','Blog Updated');
        }
        return redirect()->route('blogs.edit', $id)->with('error','Something Went Wrong');

}

 public function delete($id){
        $blog = Blog::where('id',$id)->first();
        if(!empty($blog)){
            $blog->delete();
            return redirect()->route('blogs.index')->with('success','Blog Deleted');
        }
        return redirect()->route('blogs.index')->with('error','Record Not Found');


    }
}