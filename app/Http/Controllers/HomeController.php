<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role_id == 1){
            return view('admin.dashboard');
        }
        elseif(auth()->user()->role_id == 2){
        $popularPosts = Blog::orderBy('views','DESC')->take(4)->get(); 
        $blogs = Blog::paginate();
        $categories  = Category::where('status',1)->orderBy('name','ASC')->get();
            return view('web.pages.index',compact('blogs','categories','popularPosts'));
        }
       
        elseif(auth()->user()->role_id == 3){
            $user = User::where('id',auth()->user()->id)->first();
                return view('author.dashboard',compact('user'));
            }
    }
}
