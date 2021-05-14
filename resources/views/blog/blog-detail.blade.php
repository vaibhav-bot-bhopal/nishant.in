@extends('layouts.frontend.index')

@section('title', 'Blog-Details')

@push('css')
    <style>

        .art-article table, table.art-article {
            width: 100%!important;
        }

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

        /*Responsive Image*/
        .container {
            margin-top: 20px;
            width: 100%;
        }

        :root {
            --minimum-width: 300px;
            --ratio: 16/9;
        }

        section {
            display: grid;
            gap: 10px;
            grid-template-columns: 1fr; /* Play with min-value */
        }

        img {
            background-color: #353535; /* To visualize empty space */
            aspect-ratio: var(--ratio);
            /*
                "contain" to see full original image with eventual empty space
                "cover" to fill empty space with truncating
                "fill" to stretch
            */
            object-fit: contain;
            width: 100%;
            height: auto;
        }

        @media(max-width: 768px){
            section {
                display: grid;
                gap: 10px;
                grid-template-columns: 1fr; /* Play with min-value */
            }
        }
    </style>
@endpush

@section('content')
    <div class="art-layout-wrapper">
        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell art-content">
                    <article class="art-post art-article">
                        <div class="art-postcontent art-postcontent-0 clearfix" style="text-align: justify;">
                            {{-- <p style="text-align: center;">
                                <img width="440" height="293" alt="" class="art-lightbox" src="{{asset('public/storage/eng_news/'. $detail->image)}}"><br>
                            </p> --}}

                            <div class="aspect-ratio aspect-ratio-16-9 img-frame">
                                <img alt="" class="art-lightbox" src="{{asset('public/storage/eng_news/'. $detail->image)}}"><br>
                            </div>

                            <h2>{{$detail->title}}</h2>
                            <p>
                                {!! $detail->discription !!}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
