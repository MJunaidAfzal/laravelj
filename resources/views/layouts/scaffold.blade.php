<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LTE</title>
@include('include.style')
@stack('styles')
<<<<<<< HEAD


=======
>>>>>>> 977aa7705b538266a30dd6b10d9798d0ef515577
</head>
<body>
@include('include.nav')
@if(auth()->user()->role_id == 1)
        @include('include.admin_left_nav')
    @elseif(auth()->user()->role_id == 3)
        @include('include.author_left_nav')
    @endif
@yield('content')

@include('include.script')
@stack('scripts')
<<<<<<< HEAD
    
=======
>>>>>>> 977aa7705b538266a30dd6b10d9798d0ef515577
</body>
</html>
