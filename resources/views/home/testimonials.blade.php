@extends('layouts.frontend.index')

@section('title', 'Testimonials')

@push('css')
    <style>
        .art-content .art-postcontent-0 .layout-item-0 { border-spacing: 5px 0px; border-collapse: separate;  }
        .art-content .art-postcontent-0 .layout-item-1 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-color:#E3E0BF; padding-top: 0px;padding-right: 10px;padding-bottom: 0px;padding-left: 10px; border-radius: 10px; }
        .art-content .art-postcontent-0 .layout-item-2 { border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;border-left-width:1px;border-top-color:#DEDFD3;border-right-color:#DEDFD3;border-bottom-color:#DEDFD3;border-left-color:#DEDFD3; padding-top: 0px;padding-right: 10px;padding-bottom: 0px;padding-left: 10px; border-radius: 10px; }
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
                        <div class="art-postcontent art-postcontent-0 clearfix" style="text-align: justify!important;">
                            <div class="art-content-layout layout-item-0">
                                <div class="art-content-layout-row">
                                    @forelse ($data as $data)
                                        <div class="art-layout-cell layout-item-1" style="width: 33%" >
                                            <h2 style="text-align: center;">
                                            <img width="150" height="150" style="border-radius: 50%;" alt="testimonial-image" src="{{asset('public/storage/testimonial/'. $data->image)}}" class="art-lightbox"><br></h2>
                                            <h2>{{$data->name}}</h2>
                                            <p>{!! $data->discription !!}</p>
                                        </div>
                                    @empty
                                        <h2>No Testimonials Found !!</h2>
                                    @endforelse

                                    {{-- <div class="art-layout-cell layout-item-2" style="width: 33%" >
                                        <h2><img width="150" height="150"  style="border-radius: 50%;" alt="testimonial-image" class="art-lightbox" src="{{asset('public/assets/images/shutterstock_12488026.jpg')}}"><br></h2><h2>Heading</h2><p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu justo sit amet tortor dignissim posuere. Etiam tincidunt justo eu neque pellentesque iaculis. Sed a massa at eros lobortis mattis sollicitudin quis turpis. Cras ultrices augue in ipsum sollicitudin, id maximus arcu interdum. Nunc iaculis, arcu a imperdiet malesuada, urna dui cursus ligula, vel lacinia est leo suscipit arcu. Duis eu metus in arcu finibus commodo sed sit amet leo. Aliquam quis turpis lacus. "</p>
                                        <h2 style="text-align: center;"></h2><blockquote style="text-shadow: rgba(23, 23, 23, 0.808594) 1.4px 1.4px 0px;"></blockquote>
                                    </div>

                                    <div class="art-layout-cell layout-item-2" style="width: 34%" >
                                        <h2 style="text-align: center;"><img width="150" height="150"  style="border-radius: 50%;" alt="testimonial-image" class="art-lightbox" src="{{asset('public/assets/images/Fotolia_21399008_X-06.jpg')}}"><br></h2><h2 style="text-align: center;">Heading</h2><p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu justo sit amet tortor dignissim posuere. Etiam tincidunt justo eu neque pellentesque iaculis. Sed a massa at eros lobortis mattis sollicitudin quis turpis. Cras ultrices augue in ipsum sollicitudin, id maximus arcu interdum. Nunc iaculis, arcu a imperdiet malesuada, urna dui cursus ligula, vel lacinia est leo suscipit arcu. Duis eu metus in arcu finibus commodo sed sit amet leo. Aliquam quis turpis lacus. "</p><p><br></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
