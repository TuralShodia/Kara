@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="subscribe-wrapper" >
    <h6 class="sidebar-title mt-5 mb-2">Messages</h6>
    </div>
    <form method="post" action="{{route('front.message.submit')}}">
        @csrf
        <div class="subscribe-wrapper" style="max-width: 800px">
            <div class="form-group">
            <input name="name"   class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
            <input name="surname" class="form-control" placeholder="Surname ">
            </div>
            <div class="form-group">
            <input name="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group">
            <input name="phone" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group" style="margin-left: 40px;">
            <textarea name="message" class="form-control" placeholder="Message" rows="4"  ></textarea>
            </div>        
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