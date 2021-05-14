@extends('admin.layouts.admin')
@section('content')
<style>
.error{
    color:red;
}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <!-- your code start here  -->
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-primary ">Add Testimonial</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Testimonial</li>
            </ol>
        </div><!-- /.col -->

        <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
            <div id="myAlert"></div>

            <form action="{{ route('addTestimonial') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="n_name">Name</label>
                    <input type="text" class="form-control" id="n_name" name="n_name" value="{{old('n_name')}}" placeholder="Enter Name Here">
                    @error('n_name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="n_disc">Description</label>
                    <textarea class="ckeditor form-control" rows="5" id="n_disc" name="n_disc" placeholder="Enter Description Here">{{old('n_disc')}}</textarea>
                    @error('n_disc')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong> Main Image </strong>
                    <input type="file" class="form-control-file mt-2" name="n_file">
                    @error('n_file')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 col-md-12">
            <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                <th class="text-center">SNo.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Discription</th>
                <th class="text-center">Image</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
                @php
                    $id=1;
                @endphp
                @foreach($data as $data)
                <tr>
                    <td class="text-center">{{$id}}</td>
                    <td width="15%" class="text-center">{{$data->name}}</td>
                    <td class="w-50 text-justify">{!! Str::limit($data->discription, 300, '.....') !!}</td>
                    <td class="text-center">
                        <img src="{{asset('public/storage/testimonial/'.$data->image)}}" width="100" height="100" class="img-responsive rounded-circle border border-light" alt="image">
                    </td>
                    <td><a href="{{ route('editTestimonial', $data->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteTestimonial({{ $data->id }})">Delete</button>
                        <form id="delete-form-{{ $data->id }}" action="{{ route('deleteTestimonial', $data->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @php
                    $id++;
                @endphp
                @endforeach
            </table>
            </div>
        </div>
    </div>
    <!-- your code end here  -->
</div>
<!-- /.content-header -->

<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete this article ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-Testimonial">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Delete Function -->
<script>
    function deleteTestimonial(id)
    {
        $("#delModal").modal('show');

        document.getElementById("delete-Testimonial").addEventListener("click", function(){
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        });
    }
</script>
@endpush
