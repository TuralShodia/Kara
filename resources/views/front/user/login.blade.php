@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->
    <div class="container" style="text-align: center" >        
        <h2>Login</h2>
    </div>

            <form method="POST" action="{{route('user.login.submit')}}" >
                @csrf
                <div class="container" style="text-align:center">
                    <div class="subscribe-wrapper " style="max-width: 850px">
                        <input name="name" type="text"   class="form-control" placeholder="Name">
                        <input name="password" type="password" class="form-control" placeholder="Password"> 
                    </div>
                </div>
                
                @if (session('danger'))
                <div style="color: red">{{session('danger')}}</div> 
                @endif
                <div class="mt-3 text-center" >
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            
        
@endsection