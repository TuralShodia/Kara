@extends('admin.layout.master')
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
                        <h4 class="page-title">Admin/Categories</h4>
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
            <div style="" class="col-lg-12 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success">AZ</button>
                        <button class="btn btn-success">EN</button> 
                        <button class="btn btn-success">RU</button> <hr>
                        <form class="form-horizontal form-material" action="{{route('categories.submit')}}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="name" placeholder=""
                                        class="form-control p-0 border-0"> </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Category</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <select name="category_id" id="">
                                        <option value="">nothing</option>
                                        @foreach ($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Categories</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>

                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Action</th>
 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <form action="{{route('categories.edit',$category->id)}}">
                                                <td><button type="submit" class="btn btn-primary">Edit</button></td>
                                            </form>
                                            <form action="{{route('categories.delete',$category->id)}}">
                                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                                            </form>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection