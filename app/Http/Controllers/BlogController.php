<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;


class BlogController extends Controller
{
    public function index(){
        $user = User::where('id',auth()->user()->id)->first();
        $blogs = Blog::get();
        return view('blogs.index' , compact('user','blogs'));
    }

    public function create(){
        $user = User::where('id',auth()->user()->id)->first();
        $categories = Category::get();
        $blogs = Blog::get();
        return view('blogs.create' , compact('user','categories','blogs'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:191|:blogs,title',
            'category_id' => 'required|max:191|unique:blogs,category_id',
            'short_discription' => 'required|max:800|:blogs,short_discription',
            'long_discription' => 'required|max:8000|:blogs,long_discription',

          
        ]);

        if($request->file('blog')){
            $blog = $request->file('blog');
            $blogName = 'blog' . '-' . time() . '.' . $blog->getClientOriginalExtension();
            $blog->move('upload/blog/', $blogName);
        }

        $store = Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'short_discription' => $request->short_discription,
            'long_discription' => $request->long_discription,
            'image' => $blogName,
        ]);

        if(!empty($store->id)){
            return redirect()->route('blogs.index')->with('Success' , 'Blog Added');
        }
        else{
            return redirect()->route('blogs.index')->with('error' , 'something went wrong');
        }
}

     public function edit($id){
        $user = User::where('id',auth()->user()->id)->first();
        $blog = Blog::where('id',$id)->first();
        $categories = Category::get();
        return view('blogs.edit',compact('blog','categories','user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:191|:blogs,title'.$id,
            'category_id' => 'required|max:191|unique:blogs,category_id,'.$id,
            'short_discription' => 'required|max:800|:blogs,short_discription'.$id,
            'long_discription' => 'required|max:8000|:blogs,long_discription'.$id,

        ]);

        $blogData = Blog::where('id',$id)->first();

        if($request->file('blog')){
            $blog = $request->file('blog');
            $blogName = 'blog' . '-' . time() . '.' . $blog->getClientOriginalExtension();
            $blog->move('upload/blog/', $blogName);
        }
        else{
            $blogName = $blogData->image;
        }

        $update = Blog::where('id',$id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author_id' => auth()->user()->id,
            'short_discription' => $request->short_discription,
            'long_discription' => $request->long_discription,
            'image' => $blogName,
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