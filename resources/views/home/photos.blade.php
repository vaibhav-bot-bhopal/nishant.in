@extends('layouts.frontend.index')

@section('title', 'Photos')

@push('css')
    <style>
        .art-pager .active {
            color: #000!important;
        }

        /* * {
        box-sizing: border-box;
        } */

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
            grid-template-columns: 1fr 1fr; /* Play with min-value */
        }

        img {
            background-color: gainsboro; /* To visualize empty space */
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
    <div class="container">
        <section>
            @forelse ($photos as $photo)
                <div class="aspect-ratio aspect-ratio-16-9 img-frame">
                    <img alt="" class="art-lightbox" src="{{asset('public/storage/gallery/'. $photo->filename)}}"><br>
                </div>
            @empty
        </section>
                <div style="width: 100%">
                    <h1 style="text-align: center; font-weight:600; margin: 20px 0;">
                        No Image Found !!
                    </h1>
                </div>
            @endforelse
    </div>

    <div style="width: 100%; text-align: center; margin: 0;">
        <div class="art-pager" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px;">
            @if ($photos->lastPage() > 1)
                    @if ($photos->onFirstPage())
                        <a class="{{ ($photos->currentPage() == 1) ? 'disabled' : '' }}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">« Prev</a>
                    @else
                        <a href="{{$photos->previousPageUrl()}}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">« Prev</a>
                    @endif

                    @for ($i = 1; $i <= $photos->lastPage(); $i++)
                        <a class="{{ ($photos->currentPage() == $i) ? 'active' : '' }}" href="{{ $photos->url($i) }}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">{{ $i }}</a>
                    @endfor

                    @if ($photos->hasMorePages())
                        <a class="{{ ($photos->currentPage() == $photos->lastPage()) ? ' disabled' : '' }}" href="{{$photos->nextPageUrl()}}" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">Next »</a>
                    @else
                        <span style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; ">Next »</span>
                    @endif
            @endif
        </div>
    </div>
@endsection
