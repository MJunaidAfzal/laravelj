<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        $popularPosts = Blog::orderBy('views','DESC')->take(4)->get(); 
        $blogs = Blog::where('status', 1)->paginate(5);
        $categories  = Category::where('status',1)->orderBy('name','ASC')->get();
        return view('web.pages.index',compact('blogs','categories','popularPosts'));
    }

    
    public function details($id){
        $blog = Blog::where('id',$id)->first();
        $categories  = Category::where('status',1)->orderBy('name','ASC')->get();
        $alsoLike = Blog::where('category_id', $blog->category_id)->take(3)->orderBy('id','DESC')->get();
        $popularPosts = Blog::orderBy('views','DESC')->take(4)->get(); 

        //views count
        $oldviews = $blog->views;
        $newviews = $oldviews + 1;

        //updating views to blog table
        $views = Blog::where('id',$id)->update(['views' => $newviews]);
        return view('web.pages.details',compact('blog','alsoLike','categories','popularPosts'));
    }

    public function categoryWise($id){
        $blog = Category::where('id',$id)->firstOrFail();
        $blogs  = Blog::where('category_id',$id)->paginate(9);
        $categories  = Category::where('status',1)->orderBy('name','ASC')->get();
        return view('web.pages.country-wise',compact('blogs','blog','categories'));
    }

    public function authorWise($id){
        $author = User::where('id',$id)->firstOrFail();
        $blogs  = Blog::where('author_id',$id)->paginate(9);
        return view('web.pages.author-wise',compact('blogs','author'));
    }
}
