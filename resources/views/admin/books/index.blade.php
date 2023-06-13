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
                        <h4 class="page-title">Admin/Books</h4>
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
                                <form method="POST" action="{{route('book.submit')}}" enctype="multipart/form-data" class="form-horizontal form-material">
                                    @csrf
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
                                        <label class="col-md-4 p-0">Image</label>
                                        <input type="file" name="image"  class="form-control p-0 border-"> 
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="name" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Writer</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="writer" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Year</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number"  class="form-control p-0 border-0" name="year" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Language</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="language" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Pages</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="number"  class="form-control p-0 border-0" name="pages" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label  class="col-md-12 p-0">Description</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Category</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="category_id">
                                                @if (@isset($categories))
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach 
                                                @endif
                                            </select>
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
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">books</h3>
                            <p class="text-muted">Add class <code>.table</code></p>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Writer</th>
                                            <th class="border-top-0">Language</th>
                                            <th class="border-top-0">Year</th>
                                            <th class="border-top-0">Pages</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Action</th>
 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            @foreach ($books as $book)
                                             <tr>  

                                            <td><img style="width: 80px" src="{{asset($book->image)}}"></td>
                                            <td>{{$book->name}}</td>
                                            <td>{{$book->writer}}</td>
                                            <td>{{$book->language}}</td>
                                            <td>{{$book->year}}</td>
                                            <td>{{$book->pages}}</td>
                                            @if ($book->category_id!=0)
                                              <td>{{$book->category->name}}</td> 
                                            @else
                                                <td>null</td>
                                            @endif
                                            <td>
                                                <form action="{{ route('book.edit',$book->id) }}">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('book.delete',$book->id) }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection