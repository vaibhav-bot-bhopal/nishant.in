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
    </style>
@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Article</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Article</li>
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

                    <form action="{{ route('news_update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="n_title">Title</label>
                            <input type="text" class="form-control @error('n_title') is-invalid @enderror" id="n_title" name="n_title" value="{{$data->title}}" placeholder="Enter Title Here">
                            @error('n_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="n_date">Date</label>
                            <input type="date" class="form-control @error('n_date') is-invalid @enderror" id="n_date" name="n_date" value="{{$data->date}}" >
                            @error('n_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="n_disc">Description</label>
                            <textarea class="form-control @error('n_disc') is-invalid @enderror" rows="5" id="n_disc" name="n_disc">{{$data->discription}}</textarea>
                            @error('n_disc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="callout callout-indigo" style="font-weight: 500; letter-spacing: 0.4px;">
                            <div id="word-count"></div>
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

                        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content  -->

@endsection

@push('js')

<script>
    // Initialize CKEDITOR
    ClassicEditor
    .create( document.querySelector( '#n_disc' ), {

        toolbar: [
            'heading', '|', 'undo', 'redo', '|', 'bold', 'italic', 'underline', 'alignment', 'fontFamily', 'fontSize', 'ckfinder', 'fontColor', 'fontBackgroundColor', 'removeFormat', 'specialCharacters', 'highlight', '|', 'bulletedList', 'insertTable', 'numberedList', 'strikethrough', 'subscript', 'superscript' , 'link', '|', 'outdent', 'indent', '|'
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
            ],
        },

        fontSize: {
            options: [
                'tiny',
                'default',
                'big'
            ]
        },

        fontColor: {
            // Display 6 columns in the color grid.
            columns: 6,

            // And 12 document colors (2 rows of them).
            documentColors: 12,

            // ...
        },

        fontBackgroundColor: {
            // Remove the "Document colors" section.
            documentColors: 0,

            // ...
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
                'imageTextAlternative',
                'linkImage'
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

        // Setup for Table
        table: {
            contentToolbar: [
                'tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties'
            ]
        },

    } )

    .then( editor => {
        const wordCountPlugin = editor.plugins.get( 'WordCount' );
        const wordCountWrapper = document.getElementById( 'word-count' );

        wordCountWrapper.appendChild( wordCountPlugin.wordCountContainer );
    } )
</script>

<style>
    .callout.callout-indigo {
        border-left-color: #6610f2!important;
    }

    #word-count::before{
        content: "Text Statistics";
        display: block;
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: .4em;
    }

    #word-count .ck-word-count .ck-word-count__words {
        margin-right: 1em;
    }

    #word-count .ck-word-count * {
        display: inline-block;
    }
</style>

@endpush
