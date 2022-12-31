@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="subscribe-wrapper" >
    <h6 class="sidebar-title mt-5 mb-2">Messages</h6>
    </div>
    <form action="">
        <div class="subscribe-wrapper" style="max-width: 850px">
            <input type="name"   class="form-control" placeholder="Name">
            <input type="surname" class="form-control" placeholder="Surname ">
            <input type="email" class="form-control" placeholder="Email Address">
            <input type="phone" class="form-control" placeholder="Phone Number">
            <input type="message" class="form-control" placeholder="Message ">            
        </div>
        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">send</button>
        </div>
        
    </form>
    </h6>


    <!-- Page Footer -->
@endsection