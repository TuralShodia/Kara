@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="subscribe-wrapper" >
    <h6 class="sidebar-title mt-5 mb-2">Messages</h6>
    </div>
    <form method="post" action="{{route('front.message.submit')}}">
        @csrf
        <div class="subscribe-wrapper" style="max-width: 850px">
            <input name="name"   class="form-control" placeholder="Name">
            <input name="surname" class="form-control" placeholder="Surname ">
            <input name="email" class="form-control" placeholder="Email Address">
            <input name="phone" class="form-control" placeholder="Phone Number">
            <input name="message" class="form-control" placeholder="Message ">            
        </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('errors'))
                <div class="alert alert-danger">
                {{ session()->get('errors') }}
                </div>
            @endif 
        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">send</button>
        </div>
        
    </form>
    </h6>


    <!-- Page Footer -->
@endsection