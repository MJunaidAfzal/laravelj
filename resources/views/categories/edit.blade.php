@extends('layouts.scaffold')
@section('content')
<style>
    body{
        background-color: lightgrey;
    }
</style>
<div style="margin-left: 22%;" class="container mt-5">
<div class="container mt-5">
    <div class="row">
            <div class="col-md-10">
                    <a href="{{route('categories.index')}}" class="btn btn-success float-right mb-2"> VIEW ALL</a>
            </div>
            @if(Session::has('error'))
            <div class="col-md-10">
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            </div>
            @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <div class="card">
        <h5 class="card-header">Edit Category</h5>
        <div class="card-body" >
            <form action="{{route('categories.update',$category->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="mt-3 col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control"  value="{{$category->name}}">
                        <small class="text-danger">@error('name')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12">
                        <label>Blog Name</label>
                        <input type="text" name="blog_name" class="form-control"  value="{{$category->blog_name}}">
                        <small class="text-danger">@error('blog_name')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12">
                        <label>Status</label>
                        <select name="status"  class="form-control"  value="{{$category->status}}">
                            <option value="">Please Select</option>
                            <option value="1" @if(old("status",$category->status) == 1) selected @endif>Active</option>
                            <option value="0" @if(old("status",$category->status) == 0) selected @endif>Deactive</option>
                        </select>
                        <small class="text-danger">@error('status')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12 mt-3">
                        <button type="submit"  class="btn btn-success btn-block">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
            </div>
        </div>
    </div>
   
</div>
</div>
@endsection