@extends('layouts.scaffold')
@section('content')
    <div style="margin-left: 18%;" class="mt-5 container">
    <div class="row">
        <div class="float-right col-md-12">
            <a href="{{ route('blog.create') }}"><button class="btn btn-success float-right mb-2"><b>Add More Data</b></button></a>
        </div>

        @if(Session::has('success'))
        <div class="col-md-12 alert alert-success alert-dismissible fade show mb-5 mt-5" role="alert">
        {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>



        @endif
        <table class="table table-hover table-bordered">
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Category</th>
                <th>Short Description</th>
                <th>Long Description</th>
                <th>Action</th>
            </tr>
            @foreach($blogs as $blog)
            <tr>
                <td>{{( $blog->id )}}</td>
                <td>{{( $blog->author->name )}}</td>
                <td>{{( $blog->title )}}</td>
                <td style="width:10%"><img class="rounded img-thumbnail" src="{{asset('upload/blog/'.$blog->image)}}" alt="" width="100%"></td>
                <td>{{( $blog->category->name )}}</td>
                <td>{{( $blog->short_description )}}</td>
                <td>{{( $blog->long_description )}}</td>
                <td>
                    <a href="{{route('blog.edit', $blog->id)}}" style="text-decoration: none;"><img src="{{asset('assets/img/b_edit.png')}}" alt="b_edit"> Edit</a>
                    &nbsp;|&nbsp;
                    <a class="text-danger" href="{{route('blog.delete', $blog->id)}}" style="text-decoration: none;"><img src="{{asset('assets/img/b_drop.png')}}" alt="b_drop"> Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection