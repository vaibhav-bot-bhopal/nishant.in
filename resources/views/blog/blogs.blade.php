@extends('layouts.frontend.index')

@section('title', 'Blogs')

@push('css')
    <style>
        .art-pager .active {
            color: #000!important;
        }

        .art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 5px; }
        .art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-width:1px;border-color:#AAAB8C;  border-collapse: separate; border-radius: 10px; }
        .art-content .art-postcontent-0 .layout-item-2 { padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px; border-radius: 10px; }
        .art-content .art-postcontent-0 .layout-item-3 { margin-top: 5px;margin-bottom: 5px; }
        .art-content .art-postcontent-0 .layout-item-4 { margin-top: 5px; }
        .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
        .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }


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
            width: 300px;
            height: 230px;
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
                            <div class="art-content-layout-wrapper layout-item-0">
                                @forelse ($datas as $data)
                                <div class="art-content-layout layout-item-1" style="margin-bottom: 10px;">
                                    <div class="art-content-layout-row">
                                        <div class="art-layout-cell layout-item-2" style="width: 100%" >
                                            <h2>
                                                <div class="aspect-ratio aspect-ratio-16-9 img-frame">
                                                    <img  alt="blogger-image" class="art-lightbox" src="{{asset('public/storage/eng_news/'. $data->image)}}" style="float: left;"><br>
                                                </div>
                                                {{-- <img width="300" height="203" alt="blogger-image" class="art-lightbox" src="{{asset('public/storage/eng_news/'. $data->image)}}" style="float: left;"> --}}
                                                {{$data->title}}
                                            </h2>
                                            <p>
                                                {!! Str::limit($data->discription, 500, '...') !!}
                                            </p>
                                            <p style="text-align: center;">
                                                <a href="{{route('nishant.blog-detail', $data->slug)}}" target="_top">Read more...</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <h2>Article Not Found !!</h2>
                                @endforelse
                            </div>
                        </div>

                        <div class="art-pager" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px;">
                            @if ($datas->lastPage() > 1)
                                    @if ($datas->onFirstPage())
                                        <a class="{{ ($datas->currentPage() == 1) ? 'disabled' : '' }}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">« Prev</a>
                                    @else
                                        <a href="{{$datas->previousPageUrl()}}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">« Prev</a>
                                    @endif

                                    @for ($i = 1; $i <= $datas->lastPage(); $i++)
                                        <a class="{{ ($datas->currentPage() == $i) ? 'active' : '' }}" href="{{ $datas->url($i) }}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">{{ $i }}</a>
                                    @endfor

                                    @if ($datas->hasMorePages())
                                        <a class="{{ ($datas->currentPage() == $datas->lastPage()) ? ' disabled' : '' }}" href="{{$datas->nextPageUrl()}}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">Next »</a>
                                    @else
                                        <span style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">Next »</span>
                                    @endif
                            @endif
                        </div>

                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
