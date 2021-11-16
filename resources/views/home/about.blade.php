@extends('layouts.frontend.index')

@section('title', 'About-Nishant')

@push('css')
    <style>
        .art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px; }
        .ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
        .ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
    </style>
@endpush

@section('content')
    <div class="art-layout-wrapper">
        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell art-content">
                    <article class="art-post art-article">
                        <div class="art-postcontent art-postcontent-0 clearfix">
                            <div class="art-content-layout">
                                <div class="art-content-layout-row">
                                    <div class="art-layout-cell layout-item-0" style="width: 100%; text-align: justify; font-size: 16px;">
                                        {{-- <div class="image-caption-wrapper" style="float: right; padding-top: 25px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"><img alt="an image" style="float: right; margin-top: 25px; margin-right: 5px; margin-bottom: 5px; margin-left: 5px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(156, 156, 156); border-right-color: rgb(156, 156, 156); border-bottom-color: rgb(156, 156, 156); border-left-color: rgb(156, 156, 156); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px;" class="art-lightbox" src="{{asset('public/assets/images/bio.jpg')}}" width="347" height="308"></div> --}}
                                        <h1 style="text-align: center; margin-bottom: 30px;"><span style="font-size: 42px; text-shadow: rgba(23, 23, 23, 0.808594) 1.4px 1.4px 0px; font-weight: bold; color: #E3E0BF;">Work & Collaborations</span></h1>
                                        {{-- <p><span style="color: rgb(181, 179, 155);">Kuno : The Forgotten Pride (Co-Director)</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">Bandhavgarh : 50 Glorious Years</span></p>
                                        <p><span style="color: rgb(181, 179, 155);">Gandhisagar : A land lost in Time</span><br></p> --}}
                                        {{-- <p><img width="100%" height="100%" alt="nishant-collage" src="{{asset('public/assets/images/collage.jpg')}}"><br></p> --}}
                                        <div class="container">
                                            {{-- <h2>Our  Partners</h2>
                                            <section class="customer-logos slider">
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/National-Geographic-logo.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/discovery.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/Animal_Planet.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/nhnz.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/bbc.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/disney.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/unicef.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/tech-mahindra.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/db_corp.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/Make-My-Trip.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                <img src="{{asset('public/assets/clients/mptourism.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/tata_trusts.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/anahad.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/nabard.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/rbs.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/btr.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/mptfs.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/mpfd.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/up-irrigation.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/fpai.jpg')}}">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{asset('public/assets/clients/kaav.jpg')}}">
                                                </div>
                                            </section> --}}

                                            <p style="margin: 0 10px;"><img width="100%" height="100%" alt="nishant-collage" src="{{asset('public/assets/clients/collage.jpg')}}"></p>
                                        </div>

                                        <p><img width="342" height="50" alt="nishant-sign" src="{{asset('public/assets/images/sign.png')}}"><br></p>
                                    </div>
                                </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
