@extends('admin.layouts.admin')

@push('css')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 offset-lg-1 offset-md-1">
                <h5 class="page-heading">View Your Gallery</h5>
                <!-- Gallery Section Start Here -->
                <div class="row">
                    @forelse ($photos as $photo)
                        <div class="col-md-6 col-sm-12">

                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="{{asset('public/storage/gallery/'. $photo->filename)}}" data-toggle="lightbox" data-title="{{$photo->original_name}}" data-gallery="gallery">
                                        <img class="img-fluid pad rounded" src="{{asset('public/storage/gallery/'. $photo->filename)}}" alt="Gallery Image" style="height: 300px!important;">
                                    </a>
                                </div><!-- /.card-body -->

                                <div class="card-footer d-flex">
                                    <p class="card-title mr-auto">
                                        {{$photo->original_name}}
                                        <span class="badge badge-info">{{ HumanReadable::bytesToHuman($photo->file_size) }}</span>
                                    </p>

                                    <!-- Image Tools -->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage({{ $photo->id }})">Delete <i class="fas fa-trash-alt pl-1"></i></button>

                                    <form id="delete-form-{{ $photo->id }}" action="{{ route('images-delete', $photo->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        @empty

                        <div class="col-md-12">
                            <div class="card card-widget">
                                <div class="card-body">
                                    <h3 class="text-center" style="font-weight: 600; color: #DC143C;">No Gallery Found !!</h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    @endforelse
                </div>
                <!-- Gallery Section End Here -->

                <!-- Pagination Section Start Here -->
                <div class="d-flex justify-content-center">
                    {!! $photos->links() !!}
                </div>
                <!-- Pagination Section End Here -->
            </div>
        </div>


    </div>

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
                    Are you sure, you want to delete this image ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="delImage">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
@endsection

@push('js')
    <script>
    // Delete Function
    function deleteImage(id)
    {
        $("#delModal").modal('show');

        document.getElementById("delImage").addEventListener("click", function(){
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        });
    }
    </script>

    <!-- Ekko Lightbox -->
    <script src="{{asset('public/assets/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <script>
        $(function () {
          $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
              alwaysShowClose: true
            });
          });
        })
    </script>
@endpush
