@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">

        <hr>
        <div class="page-container">
            <div class="page-content">
          
                <hr>
                <div class="row">
                    @foreach ($news as $item)                       
   
                    <div class="col-lg-6">
                        
                        <div class="card text-center mb-5">
                            <div class="card-header ">                                   
                                <div class="blog-media">
                                    <img src="{{$item->image}}" alt="" class="w-100">
                                    <a href="" class="badge badge-primary">#dolores</a>        
                                </div>  
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title mb-2">{{$item->name}}</h5> 
                                <small class="small text-muted">{{$item->created_at}}
                                    <span class="px-2">-</span>
                                    <a href="#" class="text-muted">64 Comments</a>
                                </small>
                                <p class="my-2"></p>
                            </div>
                            <div class="card-footer p-0 text-center">
                                <a href="single-post.html" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>   
                        </div>
                    </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </div>


    @endsection