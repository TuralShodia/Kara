@extends('front/layout/master')
@section('content')
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
      <!--banner section start -->
      <div class="banner_section layout_padding">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
            @if (isset($sliders))
            @foreach ($sliders as $slider)
              <div class="carousel-item @if($loop->first) active @endif">
                 <div class="container">
                    <div class="banner_taital_main">
                       <div class="row"> 
                          <div class="col-md-6">
                             <h1 class="banner_taital">{{$slider->name}}</h1>
                             <p class="banner_text">{!!$slider->description!!}</p>
                             <div class="btn_main">
                                <div class="about_bt active"><a href="{{route('front.about')}}">Haqqımızda</a></div>
                             </div>
                          </div>
                          <div class="col-md-6">
                             <div class="image_1"><img src="{{$slider->image}}" height="200px" width="400px"></div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              @endforeach
              @endif
            </div>
           <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
           <i class="fa fa-arrow-left" style="font-size:24px"></i>
           </a>
           <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
           <i class="fa fa-arrow-right" style="font-size:24px"></i>
           </a>
        </div>
     </div>
     <!--banner section end -->
     </div>
     <!--header section end -->

     
    @include('front.widget.about')



    @if(session()->has('errors'))
    <div class="alert alert-danger">
        {{ session()->get('errors') }}
    </div>
    @endif 

    
    
    @if ($news->count()>1) 
    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital">Xəbərlər</h1>
           <div class="services_section_2">
              <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-6">
                        <a href="{{route('front.news.single',$item->id)}}" class="feature-post-item">
                            <div class="image_main">
                            <img src="{{$item->image}}" class="image_8" style="width:100%">
                            <div class="text_main">
                                <div class="seemore_text">{{$item->title}}</div>
                            </div>
                            </div>
                        </a>
                    </div>
                @endforeach
              </div>
           </div>
        </div>            
    </div>
    @endif

    <hr>

    @if ($books->count()>0)
    <div class="container">
        <div class="blog_section layout_padding">
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
                                <p class="my-2">{{ \Str::limit($book->description,150)}}</p>
                            </div>
                                <a href="{{route('book.single',$book->id)}}" class="btn btn-outline-dark btn-sm">Ətraflı</a>
                        </div>
                    </div>
                    @endforeach                   
                    
                </div>
                <a href="{{route('front.book')}}" class="btn btn-primary btn-block my-4" type="submit">Ətraflı</a>
            </div>
        </div>
    </div>
    @endif

    @if (isset($testimonials))
    <!-- client section start -->
    <div class="client_section layout_padding">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($testimonials as $testimonial)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="container">
                <h1 class="client_taital">Istifadəçi rəyləri</h1>
                <div class="client_section_2">
                    <div class="client_left">
                        <div><img src="{{$testimonial->image}}" class="client_img"></div>
                    </div>
                    <div class="client_right">
                        <h3 class="client_name">{{$testimonial->name}}</h3>
                        <p class="client_text">{!!$testimonial->description!!}</p>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
        <i class="fa fa-angle-right" style="font-size:24px"></i>
        </a>
    </div>
    </div>
    <!-- client section end -->
    @endif
@endsection 