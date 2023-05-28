



    <!-- about section start -->
    <div class="news_section layout_padding">
    <div class="container">
        <h1 class="news_taital">ABOUT US</h1>
        <div class="news_section_2">
            <div class="row">
                <div class="col-md-6">
                <div class="news_taital_box">
                    <h2 class="make_text">About Us</h4>
                    <h3 class="lorem_text">{{ \Str::limit($about->description,300)}}</h3>
                </div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset($about->image)}}" height="460px" width='500px' class="mx-auto d-block" >    
                </div>
            </div>
            <div class=" text-center">
                <a href="{{route('front.about')}}">
                 <button class="btn btn-primary" type="submit">Read More</button>
                </a> 
            </div>
        </div>
    </div>
    </div>
    <!-- about section end -->
<hr>
