@extends('front/layout/master')
@section('content')

    <!-- page-header -->
    <!-- end of page header -->

    <div class="container">
        <hr>
        <div class="page-container">
            <div class="page-content">
                @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                <hr>

                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Promocode</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)  
                        @if ($order)
                      <tr>
                        <th scope="row"><img src="{{$order->book_image}}" height="100" width="120" alt=""></th>
                        <td>{{$order->book_name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->promocode}}</td>
                        <td>
                            <a href="{{route('order.cancel',$order->id)}}" >
                               <button class="btn btn-danger">
                                Cancel Order
                            </button> 
                            </a>
                        </td>
                      </tr>
                      
                    @endif
                    @endforeach 
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    @endsection