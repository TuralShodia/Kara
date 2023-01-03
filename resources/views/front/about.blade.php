@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header text-center">
                <h2 class="card-title">About Us</h2> 
            </div>
            <div class="card-body">
                <div class="blog-media">
                    <img src="{{asset($about->image)}}" alt="" class="w-100">    
                </div>  
                <h3 class="my-3">{{$about->description}}</h3>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                <button class="btn btn-primary circle-35 mr-4"><i class="ti-back-right"></i></button>
                <a href="#" class="text-dark small text-muted">By : Joe Mitchell</a>
            </div>                  
        </div>
    </div>


    @endsection