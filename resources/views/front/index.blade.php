@extends('front/layout/master')

@section('content')
<div>
@include('front.widget.about')
</div>
    <!-- page-header -->
    <!-- end of page header -->
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
    <div class="container">
        @if ($news->count()>1)
           <section>
                <div class="feature-posts" >
                    <a href="{{route('front.news')}}" class="feature-post-item">                       
                        <span>Featured News</span>
                    </a>
                    @foreach ($news as $item)
                    <a href="{{route('front.news.single',$item->id)}}" class="feature-post-item">
                        <img src="{{$item->image}}" height="250px" width="" class="w-100" alt="">
                        <div class="feature-post-caption">{{$item->title}}</div>
                    </a>
                    @endforeach
                </div>
            </section> 
        @endif
        
        <hr>
        
        @if ($books->count()>0)
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
                                </div>  
                            </div>
                            <div class="card-body px-0">
                                <h5 class="card-title mb-2">{{$book->name}}</h5> 
                                <p class="my-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos saepe dolores et nostrum porro odit reprehenderit animi, est ratione fugit aspernatur ipsum. Nostrum placeat hic saepe voluptatum dicta ipsum beatae.</p>
                            </div>
                            
                            <div class="card-footer p-0 text-center">
                                <a href="{{route('book.single',$book->id)}}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>                  
                        </div>
                    </div>
                    @endforeach                   
                    
                </div>
                <form action="{{route('front.book')}}">
                    @csrf
                <button class="btn btn-primary btn-block my-4" type="submit">Load More Posts</button>
                </form>
            </div>
        </div>
        @endif
    </div>

@endsection 