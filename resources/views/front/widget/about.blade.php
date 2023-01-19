

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
                    <img src="{{asset($about->image)}}" height="460px" width='500px' class="mx-auto d-block" >    
                </div>  
                <h3 class="my-3">{{ \Str::limit($about->description,100)}}</h3>
            </div>
            <div class=" text-center">
               <a href="{{route('front.about')}}">
                <button class="btn btn-primary" type="submit">Read More</button>
            </a> 
            </div>
        </div>
    </div>
<hr>
