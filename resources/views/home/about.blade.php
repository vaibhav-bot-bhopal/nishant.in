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
                                    <div class="art-layout-cell layout-item-0" style="width: 100%" >
                                        {{-- <div class="image-caption-wrapper" style="float: right; padding-top: 25px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;"><img alt="an image" style="float: right; margin-top: 25px; margin-right: 5px; margin-bottom: 5px; margin-left: 5px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(156, 156, 156); border-right-color: rgb(156, 156, 156); border-bottom-color: rgb(156, 156, 156); border-left-color: rgb(156, 156, 156); border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px;" class="art-lightbox" src="{{asset('public/assets/images/bio.jpg')}}" width="347" height="308"></div> --}}
                                        <h1 style="text-align: left;"><span style="font-size: 28px; text-shadow: rgba(23, 23, 23, 0.808594) 1.4px 1.4px 0px; font-family: 'Times New Roman'; font-weight: bold; color: #E3E0BF;">Biography</span></h1>
                                        <p><span style="color: rgb(181, 179, 155);">Engineer by qualification, Filmmaker by calling.</span><br></p><p><span style="color: #BAB8A1;"></span></p>
                                        <p><span style="color: #B5B39B;">I was inclined towards Photography/Videomaking since childhood, thanks to a tech-savvy dad who gifted me a handycam when I was eleven. After graduating in 2010 I worked in IT Sector for a while but spent my weekends in understanding the science behind digital imagery and developing a sense in Cinema. This led me to do experimental photography and independent film-making.</span><span style="color: #BAB8A1;"></span></p>
                                        <p><span style="color: #B5B39B;">Starting with product photoshoots, live events and making music videos soon I got an opportunity to work with Tigers in the wild and satiate my childhood fascination of becoming a Wildlife Filmmaker and working with the biggest names in the game like Animal Planet and National Geographic Channel. More than Film-making it was a period where I learned to be patient. Waiting on a Leopard for 16 hours in an open gypsy in Winters of Rajasthan without food or water teaches you more than you realize.</span><br></p>
                                        <p><span style="color: #B5B39B;">I have extensive experience of conducting 40+ seminars, Photography tours and workshops, organizing festivals (Music and Film) across several states in India for Government and NGOs alike, including UNICEF, FPAI (UN), NABARD, Women and Child Welfare Department, WWF-India to name a few.
                                        </span><br></p><p><span style="color: #B5B39B;">Between 2015 and '17, I lived the Mumbai life and worked as a Creative Producer with Postpickle.com, a wing of DB Corp. Ltd. One of their popular entities, 'Footprints', was a unique utility based travel show which provides its viewers with a ready-made itinerary to travel across the globe. Being the Writer/Director of Footprints, I was responsible for executing the production, supervising the edit, writing the script and marketing.</span><br></p>
                                        <p><span style="color: #B5B39B;">A brief but crucial phase of learning as well as contributing happened with Anahad Foundation (www.anahad.ngo) where in my role as Video Production Head, we documented folk artists from different corners of India to give them digital presence, hence empowering them with an identity.</span><br></p>
                                        <p><span style="color: #B5B39B;">After coming back to Bhopal I have been actively involved with the MP Tiger Foundation Society, helping in fund raisers, awareness campaigns etc. with the help of workshops, short documentaries etc.</span><br></p>
                                        <p><span style="color: #B5B39B;">Since May 2018 I have been a part of Disney Nature's film based on the life of Tigers, produced by Mark Linfield &amp; Vanessa Burlowitz, facilitated by Bright Tiger Films. My job is to help with liasoning, permissions and to assist the crew in the field. I also help with DIT, and a lot of research and story development. Wearing the shoes of a cameraman, I have been filming Landscapes and Behind-the-scenes for the project. The film is set to release in April 2022.</span><br></p>
                                        <p><img width="342" height="50" alt="" src="{{asset('public/assets/images/sign.png')}}"><br></p>
                                    </div>
                                </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
