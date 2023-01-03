@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="card-title">About Us</h2> 
            </div>
            <div class="card-body">
                <div class="blog-media">
                    <img src="{{asset($about->image)}}" alt="" class="w-100">    
                </div>  
                <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos saepe dolores et nostrum porro odit reprehenderit animi, est ratione fugit aspernatur ipsum. Nostrum placeat hic saepe voluptatum dicta ipsum beatae.</p>
            </div>
            
            <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                <button class="btn btn-primary circle-35 mr-4"><i class="ti-back-right"></i></button>
                <a href="{{route('front.about')}}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                <a href="#" class="text-dark small text-muted">By : Joe Mitchell</a>
            </div>                  
        </div>
        <section>
            <div class="feature-posts">
                <a href="single-post.html" class="feature-post-item">                       
                    <span>Featured Posts</span>
                </a>
                @foreach ($news as $item)
                <a href="single-post.html" class="feature-post-item">
                    <img src="{{$item->image}}" class="w-100" alt="">
                    <div class="feature-post-caption">{{$item->name}}</div>
                </a>
                @endforeach
            </div>
        </section>
        <hr>
        <div class="page-container">
            <div class="page-content">
                <hr>
                <div class="row">    
                    @foreach ($books as $book)
                        <div class="col-lg-6">
                        <div class="card text-center mb-5">
                            <div class="card-header p-0">                                   
                                <div class="blog-media">
                                    <img src="{{$book->image}}" alt="" class="w-100">
                                    <a href="#" class="badge badge-primary">#Elit</a>       
                                </div>  
                            </div>
                            <div class="card-body px-0">
                                <h5 class="card-title mb-2">{{$book->name}}</h5> 
                                <small class="small text-muted">January 10 2019 
                                    <span class="px-2">-</span>
                                    <a href="#" class="text-muted">143 Comments</a>
                                </small>
                                <p class="my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos saepe dolores et nostrum porro odit reprehenderit animi, est ratione fugit aspernatur ipsum. Nostrum placeat hic saepe voluptatum dicta ipsum beatae.</p>
                            </div>
                            
                            <div class="card-footer p-0 text-center">
                                <a href="single-post.html" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>                  
                        </div>
                    </div>
                    @endforeach                   
                    
                </div>
                <button class="btn btn-primary btn-block my-4">Load More Posts</button>
            </div>
        </div>
    </div>

    @endsection