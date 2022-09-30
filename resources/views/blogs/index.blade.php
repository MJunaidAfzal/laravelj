@extends('layouts.scaffold')
@section('content')
<style>
    body{
        background:lightgray;
    }
</style>

<div style="margin-left: 22%; " class="container mt-5">
<h1 class="text-dark"><b> BLOG </b></h1>
    <div class="row">
        <div class="col-md-10">
            <a href="{{route('blogs.create')}}"><button class="btn btn-success float-right mb-3"><b>Add More Data</b></button></a>
        </div>
        @if(Session::has('success'))
        <div class="col-md-10">
            <div class="alert alert-success">{{Session::get('success')}}</div>
        </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <table class="table table-bordered table-hover bg-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Category_id</th>
                <th>Short_discription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{($blog->id)}}</td>
                <td>{{($blog->title)}}</td>
                <td style="width:10%"><img class="rounded img-thumbnail" src="{{asset('upload/blog/'.$blog->blog)}}" alt="" width="100%"></td>         
                <td>{{($blog->category_id)}}</td>
                <td>{{($blog->short_discription)}}</td>
 
               
                <td>
                   <button class="btn btn-primary btn-sm "><a class="text-light" href="{{route('blogs.edit',$blog->id)}}"> <i class="fa fa-edit"></i> Edit</a></button> 
                    &nbsp;|&nbsp;
                   
                    <button class="btn btn-danger btn-sm"> <a class="text-light" href="{{route('blogs.delete',$blog->id)}}">  <i class="fa fa-trash"></i>  Delete</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
        </div>
    </div>
   
</div>


@endsection                     