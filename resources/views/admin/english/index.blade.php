@extends('admin.layouts.admin')

@push('css')
    <style>
        .image.image_resized {
            display: block;
            box-sizing: border-box;
            margin: 0 auto;
        }

        .image.image_resized img {
            width: 100%;
        }

        .image > figcaption {
            display: block;
            text-align: center;
            letter-spacing: 0.4px;
        }

        .image.image_resized > figcaption {
            display: block;
            text-align: center;
        }

        .image img{
            width: 100%;
            border-radius: 5px!important;
        }

        .image-style-align-left {
            float: left;
            margin-right: 1.5em!important;
        }

        .image-style-align-right {
            float: right;
            margin-left: 1.5em!important;
        }

        .image-style-align-center {
            margin-left: auto;
            margin-right: auto;
        }

        .image-style-side {
            float: right;
            margin-left: 1.5em!important;
            max-width: 50%;
        }

        /* Error Style */
        .error{
            color:red;
        }
    </style>
@endpush

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <!-- your code start here  -->
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-primary ">Add Article</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Article</li>
            </ol>
        </div><!-- /.col -->
        <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2">
            <div id="myAlert"></div>

            <form action="{{ route('news_create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="n_title">Title</label>
                    <input type="text" class="form-control" id="n_title" name="n_title" value="{{old('n_title')}}" placeholder="Enter Title Here">
                    @error('n_title')
                        span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="n_data">Date</label>
                    <input type="date" class="form-control" id="n_date" name="n_date" value="{{old('n_date')}}" >
                    @error('n_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="n_disc">Description</label>
                    <textarea class="form-control" rows="5" id="n_disc" name="n_disc">{{old('n_disc')}}</textarea>
                    @error('n_disc')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong> Main Images </strong>
                    <input type="file" class="form-control-file" name="n_file">
                    @error('n_file')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <strong> Other Images </strong>
                    <input type="file" class="form-control-file mt-2" name="n_file_m[]" multiple>
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
                <th class="text-center">Title</th>
                <th class="text-center">Date</th>
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
                    <td width="15%" class="text-center">{{$data->title}}</td>
                    <td width="10%" class="text-center">{{ date('d-m-Y', strtotime($data->date)) }}</td>
                    <td class="w-50 text-justify">{!! Str::limit($data->discription, 300, '.....') !!}</td>
                    <td>
                        <img src="{{asset('public/storage/eng_news/'.$data->image)}}" width="200" height="150" class="img-responsive rounded" alt="image">
                    </td>
                    <td><a href="{{ route('news_edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deletePost({{ $data->id }})">Delete</button>
                        <form id="delete-form-{{ $data->id }}" action="{{ route('news_del', $data->id) }}" method="POST" style="display: none;">
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
                <button type="button" class="btn btn-danger" id="delPost">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
    // Initialize CKEDITOR
    ClassicEditor
    .create( document.querySelector( '#n_disc' ), {

        toolbar: [
            'heading', '|', 'undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikethrough', 'ckfinder', 'highlight', 'subscript', 'superscript' ,'|', 'alignment', 'fontFamily', 'fontSize', 'fontColor', 'bulletedList', 'numberedList', 'link', '|', 'outdent', 'indent', '|'
        ],

        alignment: {
            options: [ 'left', 'right', 'center', 'justify']
        },

        // Setup for Fonts

        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        },

        fontSize: {
            options: [
                'tiny',
                'default',
                'big'
            ]
        },

        fontColor: {
            colors: [
                {
                    color: 'hsl(0, 0%, 0%)',
                    label: 'Black'
                },
                {
                    color: 'hsl(0, 0%, 30%)',
                    label: 'Dim grey'
                },
                {
                    color: 'hsl(0, 0%, 60%)',
                    label: 'Grey'
                },
                {
                    color: 'hsl(0, 0%, 90%)',
                    label: 'Light grey'
                },
                {
                    color: 'hsl(0, 0%, 100%)',
                    label: 'White',
                    hasBorder: true
                },
            ]
        },

        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },

        // Setup Highlighter
        highlight:{
            options:[
                { model: 'yellowMarker', class: 'marker-yellow', title: 'Yellow Marker', color: 'var(--ck-highlight-marker-yellow)', type: 'marker' },
                { model: 'greenMarker', class: 'marker-green', title: 'Green marker', color: 'var(--ck-highlight-marker-green)', type: 'marker' },
                { model: 'pinkMarker', class: 'marker-pink', title: 'Pink marker', color: 'var(--ck-highlight-marker-pink)', type: 'marker' },
                { model: 'blueMarker', class: 'marker-blue', title: 'Blue marker', color: 'var(--ck-highlight-marker-blue)', type: 'marker' },
                { model: 'redPen', class: 'pen-red', title: 'Red pen', color: 'var(--ck-highlight-pen-red)', type: 'pen' },
                { model: 'greenPen', class: 'pen-green', title: 'Green pen', color: 'var(--ck-highlight-pen-green)', type: 'pen' }
            ]
        },

        // Setup for Image

        image: {
            // Configure the available styles.
            styles: [
                'alignLeft', 'alignCenter', 'alignRight'
            ],

            resizeUnit: '%',


            // Configure the available image resize options.
            resizeOptions: [
                {
                    name: 'imageResize:original',
                    value: null,
                    label: 'Original',
                    icon: 'original'
                },
                {
                    name: 'imageResize:25',
                    value: '25',
                    label: '25%',
                    icon: 'small'
                },
                {
                    name: 'imageResize:50',
                    value: '50',
                    label: '50%',
                    icon: 'medium'
                },
                {
                    name: 'imageResize:75',
                    value: '75',
                    label: '75%',
                    icon: 'large'
                }
            ],

            // You need to configure the image toolbar, too, so it shows the new style
            // buttons as well as the resize buttons.
            toolbar: [
                'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                '|',
                'imageResize', 'ImageResizeHandles',
                '|',
                'imageTextAlternative'
            ]
        },

        // Setup for Links
        link: {
            // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
            addTargetToExternalLinks: true,

            // Let the users control the "download" attribute of each link.
            decorators: [
                {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'download'
                    }
                }
            ]
        },

        //Setup for Indent Block
        indentBlock: {
            offset: 1,
            unit: 'em'
        },

    } );
</script>

<script>
    // Delete Function
    function deletePost(id)
    {
        $("#delModal").modal('show');

        document.getElementById("delPost").addEventListener("click", function(){
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        });
    }
</script>
@endpush
