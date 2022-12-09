@extends('admin/layout/master')
@section('content')

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin/books</h4>
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
                <div class="row">
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action='{{route('book.submit')}}' enctype="multipart/form-data" class="form-horizontal form-material">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Image</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <img style="width: 80px" src="{{asset($book->image)}}">
                                            <input type="file" value="" name="image" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div>
                                        <label  class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"   value="{{$book->language}}"  class="form-control p-0 border-0" name="name" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Writer</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  value="{{$book->language}}" class="form-control p-0 border-0" name="writer" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Year</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number"  value="{{$book->year}}"  class="form-control p-0 border-0" name="year" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Language</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{$book->language}}"  class="form-control p-0 border-0" name="language" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Pages</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number" value="{{$book->pages}}"  class="form-control p-0 border-0" name="pages" >
                                        </div>
                                    </div>
                               
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Add book</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection