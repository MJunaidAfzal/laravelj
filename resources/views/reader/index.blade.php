@extends('layouts.scaffold')
@section('content')
<div style="margin-left: 22%; " class="container mt-5">
<div class="container">
    <div class="row">
        <div class="col-md-10">
        <table class="table table-bordered table-hover bg-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{($user->id)}}</td>
                <td>{{($user->name)}}</td>
                <td>{{($user->email)}}</td>
                <td>{{($user->role_id)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>

</div>
@endsection