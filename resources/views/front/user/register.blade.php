@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="container" style="text-align: center" >        
        <h2>Sign Up</h2>
    </div>
    <form method="POST" action="{{route('user.register.submit')}}">
        @csrf
        <div class="container" style="text-align:center">
            <div class="subscribe-wrapper" style="max-width: 850px">
                <input type="text" name="name"  class="form-control" placeholder="Name">
                <input type="email" name="email" class="form-control" placeholder="Email Address" >
                <input type="password" name="password" class="form-control" placeholder="Password ">    
                <input type="hidden" name="role_id" value="1">        
            </div>
        </div>
        <div class="mt-3 text-center" >
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
        
    </form>


    <!-- Page Footer -->
@endsection