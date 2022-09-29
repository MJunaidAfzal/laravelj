@extends('layouts.scaffold')
@section('content')
<style>
    body{
        background:lightgray;
    }
</style>

<div style="margin-left: 22%; " class="container mt-5">
<h1 class="text-dark"><b> CATEGORY </b></h1>
    <div class="row">
        <div class="col-md-10">
            <a href="{{route('categories.create')}}"><button class="btn btn-warning float-right mb-3">Add More Data</button></a>
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
                <th>Name</th>
                <th>Blog Name</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{($category->id)}}</td>
                <td>{{($category->name)}}</td>
                <td>{{($category->blog_name)}}</td>

                <td>
                    @if($category->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge  badge-danger">Deactive</span>
                    @endif
                </td>
                <td>
                   <button class="btn btn-primary btn-sm "><a class="text-light" href="{{route('categories.edit',$category->id)}}"> <i class="fa fa-edit"></i> Edit</a></button> 
                    &nbsp;|&nbsp;
                   
                    <button class="btn btn-danger btn-sm"> <a class="text-light" href="{{route('categories.delete',$category->id)}}">  <i class="fa fa-trash"></i>  Delete</a></button>
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