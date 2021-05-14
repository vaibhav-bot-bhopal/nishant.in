@extends('layouts.frontend.index')

@section('title', 'Home')

@push('js')
    <script>jQuery(function ($) {
        'use strict';
        if ($.fn.themeSlider) {
            $(".art-slidecontainerslide1").each(function () {
                var slideContainer = $(this), tmp;
                var inner = $(".art-slider-inner", slideContainer);
                inner.children().filter("script").remove();
                var helper = null;

                if ($.support.themeTransition) {
                    helper = new BackgroundHelper();
                    helper.init("fade", "next", $(".art-slide-item", inner).first().css($.support.themeTransition.prefix + "transition-duration"));
                    inner.children().each(function () {
                        helper.processSlide($(this));
                    });


                } else if (browser.ie && browser.version <= 8) {
                    var slidesInfo = {
                    ".art-slideslide10": {
                        "bgimage" : "url('public/assets/images/slideslide10.jpg')",
                        "bgposition": "0 0",
                        "images": "",
                        "positions": ""
                    },
                    ".art-slideslide11": {
                        "bgimage" : "url('public/assets/images/slideslide11.jpg')",
                        "bgposition": "0 0",
                        "images": "",
                        "positions": ""
                    },
                    ".art-slideslide12": {
                        "bgimage" : "url('public/assets/images/slideslide12.jpg')",
                        "bgposition": "0 0",
                        "images": "",
                        "positions": ""
                    },
                    ".art-slideslide13": {
                        "bgimage" : "url('public/assets/images/slideslide13.jpg')",
                        "bgposition": "0 0",
                        "images": "",
                        "positions": ""
                    },
                    ".art-slideslide14": {
                        "bgimage" : "url('public/assets/images/slideslide14.jpg')",
                        "bgposition": "0 0",
                        "images": "",
                        "positions": ""
                    }
                        };
                        $.each(slidesInfo, function(selector, info) {
                            processElementMultiplyBg(slideContainer.find(selector), info);
                        });
                    }

                    inner.children().eq(0).addClass("active");
                    slideContainer.themeSlider({
                        pause: 3000,
                        speed: 1000,
                        repeat: true,
                        animation: "fade",
                        direction: "next",
                        navigator: slideContainer.siblings(".art-slidenavigatorslide1"),
                        helper: helper
                    });


                });
            }
        });
    </script>
@endpush

@section('content')
    <div class="art-layout-wrapper">
        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell art-content">
                    <article class="art-post art-article">
                        <div class="art-postcontent art-postcontent-0 clearfix">
                            <!-- For Video Only -->
                                {{-- <p style="text-align: justify;">
                                    <iframe width="960" height="540" src="https://www.youtube.com/embed/a3ICNMQW7Ok?wmode=transparent&amp;amp;wmode=transparent&amp;amp;wmode=transparent" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe><br>
                                </p> --}}
                            <!-- ./ End For Video Only -->

                            <!-- For Slider Only -->
                            <div class="art-content-layout">
                                <div class="art-content-layout-row">
                                    <div class="art-layout-cell" style="width: 100%" >
                                        <p style="text-align: justify;"></p><div id="slide1" style="position: relative; display: inline-block; z-index: 0; margin: 5px;  border-width: 0px;  " class="art-collage">
                                            <div class="art-slider art-slidecontainerslide1" data-width="931" data-height="620">
                                                <div class="art-slider-inner">
                                                    <div class="art-slide-item art-slideslide10" ></div>
                                                    <div class="art-slide-item art-slideslide11" ></div>
                                                    <div class="art-slide-item art-slideslide12" ></div>
                                                    <div class="art-slide-item art-slideslide13" ></div>
                                                    <div class="art-slide-item art-slideslide14" ></div>
                                                </div>
                                            </div>

                                            <div class="art-slidenavigator art-slidenavigatorslide1" data-left="0.5" data-top="1">
                                                <a href="#" class="art-slidenavigatoritem"></a>
                                                <a href="#" class="art-slidenavigatoritem"></a>
                                                <a href="#" class="art-slidenavigatoritem"></a>
                                                <a href="#" class="art-slidenavigatoritem"></a>
                                                <a href="#" class="art-slidenavigatoritem"></a>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ End For Slider Only -->

                            <!-- For Biography -->
                            <div class="art-content-layout">
                                <div class="art-content-layout-row">
                                    <div class="art-layout-cell layout-item-0" style="width: 100%" >
                                        <h1 style="text-align: left;"><span style="font-size: 28px; text-shadow: rgba(23, 23, 23, 0.808594) 1.4px 1.4px 0px; font-family: 'Times New Roman'; font-weight: bold;">Biography</span></h1>
                                        <p><span style="color: rgb(181, 179, 155);">Engineer by qualification, Filmmaker by calling.</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">I was inclined towards Photography/Videomaking since childhood, thanks to a tech-savvy dad who gifted me a handycam when I was eleven. After graduating in 2010 I worked in IT Sector for a while but spent my weekends in understanding the science behind digital imagery and developing a sense in Cinema. This led me to do experimental photography and independent film-making.<img width="250" height="222" alt="Profile Picture" class="art-lightbox" src="{{asset('public/assets/images/bio.jpg')}}" style="float: right; margin-right: 5px; "></span></p>
                                        <p><span style="color: rgb(181, 179, 155);">Starting with product photoshoots, live events and making music videos soon I got an opportunity to work with Tigers in the wild and satiate my childhood fascination of becoming a Wildlife Filmmaker and working with the biggest names in the game like Animal Planet and National Geographic Channel. More than Film-making it was a period where I learned to be patient. Waiting on a Leopard for 16 hours in an open gypsy in Winters of Rajasthan without food or water teaches you more than you realize.</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">I have extensive experience of conducting 40+ seminars, Photography tours and workshops, organizing festivals (Music and Film) across several states in India for Government and NGOs alike, including UNICEF, FPAI (UN), NABARD, Women and Child Welfare Department, WWF-India to name a few.&nbsp;</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">Between 2015 and '17, I lived the Mumbai life and worked as a Creative Producer with Postpickle.com, a wing of DB Corp. Ltd. One of their popular entities, 'Footprints', was a unique utility based travel show which provides its viewers with a ready-made itinerary to travel across the globe. Being the Writer/Director of Footprints, I was responsible for executing the production, supervising the edit, writing the script and marketing.</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">A brief but crucial phase of learning as well as contributing happened with Anahad Foundation (www.anahad.ngo) where in my role as Video Production Head, we documented folk artists from different corners of India to give them digital presence, hence empowering them with an identity.</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">After coming back to Bhopal I have been actively involved with the MP Tiger Foundation Society, helping in fund raisers, awareness campaigns etc. with the help of workshops, short documentaries etc.</span><br></p>
                                        <p><span style="color: rgb(181, 179, 155);">Since May 2018 I have been a part of Disney Nature's film based on the life of Tigers, produced by Mark Linfield &amp; Vanessa Burlowitz, facilitated by Bright Tiger Films. My job is to help with liasoning, permissions and to assist the crew in the field. I also help with DIT, and a lot of research and story development. Wearing the shoes of a cameraman, I have been filming Landscapes and Behind-the-scenes for the project. The film is set to release in April 2022.</span><br></p>
                                        <p><img width="342" height="50" alt="" class="art-lightbox" src="{{asset('public/assets/images/sign.png')}}" style=" float: left; margin-left: 0px;"></p><p><br></p>
                                    </div>
                                </div>
                            </div>
                            <!-- ./End For Biography -->
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection

