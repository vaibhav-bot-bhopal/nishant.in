@extends('layouts.frontend.index')

@section('title', 'Gallery')

@section('content')
    <div class="art-layout-wrapper">
        <div class="art-content-layout">
            <div class="art-content-layout-row">
                <div class="art-layout-cell art-content">
                    <article class="art-post art-article">
                        <div class="art-postcontent art-postcontent-0 clearfix">
                            <div id="pixlee_container"></div>
                                <script type="text/javascript">
                                    window.PixleeAsyncInit = function() {Pixlee.init({apiKey:'TQE9YA3YqAvBzrq_oLc9'});Pixlee.addSimpleWidget({widgetId:'31835'});};
                                </script>
                                <script src="//instafeed.assets.pxlecdn.com/assets/pixlee_widget_1_0_0.js"></script>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
