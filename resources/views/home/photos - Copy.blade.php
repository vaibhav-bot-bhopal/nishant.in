@extends('layouts.frontend.index')

@section('title', 'Photos')

@push('css')
<style>
    /* .container {
        background-color: red;
        position: relative;
        width: 100%;
    }

    .image-container{
        display: flex;
        justify-content: space-between;
        border: 0px solid #000!important;
        width: 100%;
        box-sizing: border-box;
    }

    .image-box{
        width: 100%;
        height: 220px;
        position:relative;
        margin: 5px 5px;
    }

    .image img{
        width:100%;
        height:100%;
        position:absolute;
    }

    @media screen and (max-width: 768px) {
        .image-container{
            display: flex;
            flex-direction: column;
        }

        .image-box{
            height: 300px;
            margin: 5px 0px;
        }
    } */

    .container {
        border: 2px solid red;
        width: 100%;
    }

    /* .image-container{
        display: flex;
        justify-content: space-between;
        width: 100%;
        box-sizing: border-box;
    } */

    .image-wrapper {
        position: relative;
        padding-bottom: 56.2%;
        margin: 5px 5px;
    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

</style>

@endpush

@section('content')
<div class="container">
    <div class="image-container">
        @forelse ($photos as $photo)
        <div class="image-wrapper">
            {{-- <div class="image"> --}}
                <img alt="" class="art-lightbox" src="{{asset('public/storage/gallery/'. $photo->filename)}}"><br>
            {{-- </div> --}}
        </div>
        @empty
        <div class="art-layout-cell" style="width: 100%" >
            <h1 style="text-align: center; font-weight:600; margin: 50px 0;">
                No Image Found !!
            </h1>
        </div>
        @endforelse
    </div>
</div>
{{-- <div class="art-sheet clearfix">
    <div class="art-layout-wrapper">
        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell art-content">
                    <article class="art-post art-article">
                        <div class="art-postcontent art-postcontent-0 clearfix">
                            <div class="art-content-layout">
                                <div class="art-content-layout-row">
                                    @forelse ($photos as $photo)
                                    <div class="art-layout-cell" style="width: 100%" >
                                        <p style="text-align: center;">
                                            <img width="240" height="240" alt="" class="art-lightbox" src="{{asset('public/storage/gallery/'. $photo->filename)}}"><br>
                                        </p>
                                    </div>
                                    @empty
                                    <div class="art-layout-cell" style="width: 100%" >
                                        <h1 style="text-align: center; font-weight:600; margin: 50px 0;">
                                            No Image Found !!
                                        </h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    <div class="art-content-layout">
        <div class="art-content-layout-row">
        <div class="art-layout-cell" style="width: 100%" >
            <p style="text-align: center;"><span style="text-align: center;"><a href="#" style="margin-right: 4px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block; ">« Previous</a><span class="active" style="border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; margin-right: 4px; margin-left: auto; line-height: normal; position: relative; display: inline-block; color: rgb(44, 44, 32); background-color: rgb(201, 201, 181);">1</span><a href="#" style="margin-right: 4px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">2</a><a href="#" style="margin-right: 4px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">3</a><a href="#" style="margin-right: 4px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">4</a><a href="#" style="margin-right: 4px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">5</a><a href="#" class="more" style="margin-right: 4px; margin-left: auto; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(196, 196, 196); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">...</a><a href="#" style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; line-height: normal; color: rgb(205, 206, 187); border-top-left-radius: 4px 4px; border-top-right-radius: 4px 4px; border-bottom-right-radius: 4px 4px; border-bottom-left-radius: 4px 4px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(225, 225, 214); border-right-color: rgb(225, 225, 214); border-bottom-color: rgb(225, 225, 214); border-left-color: rgb(225, 225, 214); position: relative; display: inline-block;">Next »</a></span><br></p>
        </div>
        </div>
    </div>
</div> --}}
@endsection
