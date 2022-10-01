@extends('layouts.scaffold')
@section('content')
<style>
    body{
        background-color:lightgrey;
    }
</style>
<div class="container mt-3">
        <div class="row">
            <div class="hi col-md-12">
                <a href="{{route('blogs.index')}}" class="btn btn-info  float-right"><b>VIEW ALL</b></a>
            </div>
        </div>
    </div>

    <div style="margin-left:22%" class="container">
                <div class="row">
                    <div class="col-md-10">
        <form class="mt-5" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
         
                    <div class="card">
                <div class="card-header bg-dark">
                    <h2 class="text-center text-light"><b>CREATE BLOG</b> </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                            <small class="text-danger">@error ('title') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="blog">Thumbnail</label>
                            <input type="file" class="form-control" name="blog">
                            <small class="text-danger">@error ('blog') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">@error ('category_id') {{ $message }} @enderror</small>
                        </div>
                          
                        <div class="col-md-12 mt-3">
                            <label for="short_discription">short_discription</label>
                            <textarea name="short_discription" cols="30" rows="7" class="form-control"></textarea>
                            <small class="text-danger">@error ('short_discription') {{ $message }} @enderror</small>                            
                        </div>
                       
                    </div>
                    <button class="btn btn-primary mt-3 btn-block" type="submit"><b>SUBMIT</b></button>
                </div>
            </div>
                
        </form>
        </div>
                </div>
            </div>
            
@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endpush