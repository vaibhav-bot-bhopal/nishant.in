@extends('admin.layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Testimonial</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Testimonial</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
                <form action="{{ route('updateTestimonial', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="n_name">Name</label>
                        <input type="text" class="form-control @error('n_name') is-invalid @enderror" id="n_name" name="n_name" value="{{$data->name}}" placeholder="Enter Name Here">
                        @error('n_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="n_disc">Description</label>
                        <textarea class="ckeditor form-control @error('n_disc') is-invalid @enderror" rows="5" id="n_disc" name="n_disc">{{$data->discription}}</textarea>
                        @error('n_disc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="hidden" name="h_file" value="{{$data->image}}">

                    <div class="form-group">
                        <label>Main Image</label>
                        <input type="file" class="form-control-file mt-2 @error('n_file') is-invalid @enderror" name="n_file">
                        @error('n_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2 mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content  -->

@endsection
