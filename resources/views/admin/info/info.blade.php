@extends('admin.layout.master')
@section('content')

      <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin/News</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                               <li><a href="{{route('dashboard')}}" class="fw-normal">Dashboard</a></li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                
                    <!-- Column -->
                    <!-- Column -->
                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->
                        <div class="col-lg-8 col-xlg-9 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action='{{route('info.submit')}}' enctype="multipart/form-data" class="form-horizontal form-material">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Name</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text"  class="form-control p-0 border-0" name="name" id="example-email">
                                            </div>
                                        </div>
                                            <label class="col-md-4 p-0">Image</label>
                                            <input type="file" name="image"  class="form-control p-0 border-"> 
                                        
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Title</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder="" class="form-control p-0 border-0" name="title" id="example-email">
                                            </div>
                                        </div>
                                     
                                        <div class="form-group mb-4">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success">Add Product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">All Categories</h3>
                                    
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
        
                                                    <th class="border-top-0">Name</th>
                                                    <th class="border-top-0">Image</th>
                                                    <th class="border-top-0">Title</th>
                                                    <th class="border-top-0">Action</th>
         
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allnews as $news)
                                                    
                                                
                                                <tr>
                                                    <td>{{$news->name}}</td>
                                                    <td><img style="width: 80px" src="{{asset($news->image)}}" ></td>
                                                    <td>{{$news->title}}</td>
                                                    <td>
                                                        <form action="{{route('info.edit',$news->id)}}">
                                                            <button type="submit">Edit</button>
                                                        </form>
                                                        <form action="{{route('info.delete',$news->id)}}">
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Right sidebar -->
                        <!-- ============================================================== -->
                        <!-- .right-sidebar -->
                        <!-- ============================================================== -->
                        <!-- End Right sidebar -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection