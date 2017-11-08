@extends('frontend.layouts.app')

@push ('after-styles')
<link rel="stylesheet" href="{{ asset('unitegallery/css/unite-gallery.css') }}">
<link rel="stylesheet" href="{{ asset('unitegallery/themes/default/ug-theme-default.css') }}">
@endpush

@section('content')
    <section class="new-section">
        <div class="container">
            <header class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>Galeria de Vídeos e Imagens</h1>
                    </div>
                </div>
            </header>
            <div class="row">
                <div id="gallery" style="display:none;">
                    @foreach ($galleries as $gallery)
                        @if ($gallery->type == 'image')
                            <img alt="Imagem - {{ app_name() }}"
                                 src="{{ asset($gallery->image) }}"
                                 data-image="{{ asset($gallery->getOriginalImage()) }}">
                        @else
                            <img alt="Vídeo - {{ app_name() }}"
                                 data-type="youtube"
                                 data-videoid="{{ $gallery->video }}">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push ('after-scripts')
<script src="{{ asset('unitegallery/themes/default/ug-theme-default.js') }}"></script>
<script src="{{ asset('unitegallery/js/unitegallery.min.js') }}"></script>
<script>
    jQuery(document).ready(function () {
        jQuery("#gallery").unitegallery({
            gallery_width: 1600,
            gallery_height: 800
        });
    });
</script>
@endpush