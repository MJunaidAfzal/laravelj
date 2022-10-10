@extends('layouts.scaffold')
@section('content')

<style>
    body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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

    @if(Session::has('error'))
            <div style="margin-left:22%" class="col-md-10 ">
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            </div>
            @endif
    </div>

                    <div style="margin-left:22%" class="container mt-3">
                        <div class="row">
                            <div class="col-md-10">
                            <form action="{{route('blogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header text-center bg-dark text-light">
                             <h2>  <b>EDIT BLOG</b></h2> 
                            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title"  value="{{old('title', $blog->title) }}">
                            <small class="text-danger">@error ('title') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-md-12 mt-3">
                    <label class="text-dark" for="blog"><b>Thumbnail</b></label>
                              <input type="file" class="form-control" name="blog" value="{{old('blog', $blog->blog) }}">
                        <small class="text-danger">@error('blog'){{$message}} @enderror</small>
                        @if(!empty($blog->image))
                        <img src="{{asset('upload/blog/'.$blog->image)}}" class="img-thumbnail bg-dark" style="height:50px; width:70px">
                        @endif
                    </div>
                        <div class="col-md-12 mt-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control" value="{{$blog->category}}">
                                <option value="">Please Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->name}}"  @if($category->name == $blog->category_id) selected @endif>>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">@error ('category_id') {{ $message }} @enderror</small>
                        </div>
                          
                        <div class="col-md-12 mt-3">
                            <label for="short_discription">short_discription</label>
                            <textarea name="short_discription" cols="30" rows="7" onKeyPress class="form-control" >{{$blog->short_discription}}</textarea>
                            <small class="text-danger">@error ('short_discription') {{ $message }} @enderror</small>                            
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="long_description">long_description</label>
                            <textarea name="long_description" id="long_description" cols="30" rows="7" onKeyPress class="form-control" >{{$blog->long_description}}</textarea>
                            <small class="text-danger">@error ('long_description') {{ $message }} @enderror</small>                            
                        </div>
                      
                    </div>
                    <button class="btn btn-success mt-3 btn-block" type="submit"><b>UPDATE</b></button>
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
    tinymce.init({ selector:'#long_description' });
</script>
@endpush