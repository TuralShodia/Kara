@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">

        <hr>
        <div class="page-container">
            <div class="page-content">
          
                @include('front.widget.category')
                <hr>
                <div class="row">
                    @foreach ($books as $book)                       
                    <div class="col-lg-6">
                        <div class="card text-center mb-5">
                            <div class="card-header ">                                   
                                <div class="blog-media">
                                    <img src="{{$book->image}}" alt="" class="w-100">
                                </div>  
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title mb-2">{{$book->name}}</h5> 
                                <small class="small text-muted">{{$book->created_at}}
                                    <span class="px-2">Category:{{$book->category->name}}</span>
                                </small>
                                <p class="my-2"></p>
                            </div>
                            <div class="card-footer p-0 text-center">
                                <a href="{{route('book.single',$book->id)}}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>   
                        </div>
                    </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </div>


    @endsection