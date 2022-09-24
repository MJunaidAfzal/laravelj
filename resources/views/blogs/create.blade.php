@extends('layouts.scaffold')
@push('styles')
<style>
    body{
        background-color: lightgray;
    }
    label{
        color:black;
    }
</style>
@endpush
@section('content')
<div style="margin-left: 22%;" class="container mt-5">
    <div class="container mt-5">
        <div class="row">
                {{-- <div class="col-md-10">
                        <a href="" class="btn btn-primary float-right mb-2"> VIEW ALL</a>
                </div> --}}
                @if(Session::has('error'))
                <div class="col-md-10">
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                </div>
                @endif
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Category</label>
                            <select name="category_id" id="" required class="form-control">
                                <option value="">Please Select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" required0>
                        </div>
                        <div class="col-md-12">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="col-md-12">
                            <label for="content">Content</label>
                            <textarea  class="form-control" cols="30" rows="25" name="content" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-success mt-3 btn-block" type="submit">Submit</button>
                </form>
            </div>
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
