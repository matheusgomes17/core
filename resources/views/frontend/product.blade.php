@extends('frontend.layouts.app')

@section('content')<div id="fb-root"></div>
	<div class="breadcrumbs-area breadcrumb-bg ptb-100">
	    <div class="container">
	        <div class="breadcrumbs text-center">
                <h2 class="breadcrumb-title">{{ $product->name }}</h2>
                <ul>
                    <li><a class="active" href="{{ route('frontend.index') }}">Início</a></li>
                    <li><a class="active" href="{{ route('frontend.category', $product->categories->slug) }}">{{ $product->categories->name }}</a></li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
	    </div>
	</div>
    <section class="featured-section">
        <div class="container">
            <div class="row">
				<div class="single-product-area ptb-100">
				    <div class="container">
		                <div class="row">
		                    <div class="col-md-7">
		                        <div class="product-details-tab">
		                            <!-- Tab panes -->
		                            <div class="tab-content">
		                                <div class="tab-pane active">
		                                    <div class="large-img">
		                                        <img src="{{ asset($product->getOriginalImage()) }}" alt="" />
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-md-5">
		                        <div class="single-product-content">
		                            <div class="single-product-dec pb-30  for-pro-border">
		                                <h2>{{ $product->name }}</h2>
		                                <span class="ratting">
		                                    <i class="fa fa-star active"></i>
		                                    <i class="fa fa-star active"></i>
		                                    <i class="fa fa-star active"></i>
		                                    <i class="fa fa-star active"></i>
		                                    <i class="fa fa-star active"></i>
		                                </span><br><br>
		                                {!! $product->description !!}
		                            </div>
		                            <div class="single-cart-color for-pro-border">
		                                <div class="model">
		                                	<p>Categoria: <span><a href="{{ route('frontend.category', $product->categories->slug) }}">{{ $product->categories->name }}</a></span></p>
		                                </div>
		                                <div class="model">
		                                    <p>Altura: <span>{{ $product->height }}</span></p>
		                                </div>
		                                <div class="model">
		                                    <p>Descendência: <span>{{ $product->membership }}</span></p>
		                                </div>
		                            </div>
		                            <div class="pro-shared">
		                                <p>Compartilhe:</p>
										<div class="social-media">
											<ul>
												<li class="fb"><a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u={{ urlencode(route('frontend.product', $product->slug)) }}/','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');" itemprop="url" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
												<li><g:plusone></g:plusone></li>
												<li><a class="twitter-share-button" href="https://twitter.com/share" itemprop="url" rel="nofollow" data-url="{{ route('frontend.product', $product->slug) }}" data-text="{{ $product->name }}" data-via="GaloChideroli" data-lang="pt"></a></li>
											</ul>
										</div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
				    </div>
				</div>
            </div>
        </div>
    </section>
    <section class="new-section">
        <div class="container">
            <header class="row">
                <div class="col-md-12">
                    <div class="titie-section">
                        <h1>ANIMAIS RELACIONADOS</h1>
                    </div>
                </div>
            </header>
            <div class="row">
                @foreach ($related as $r)
                    <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.2s">
                        @include ('frontend.includes.partials.product_item', ['model' => $r])
                    </div>
                @endforeach
            </div>
        </div>
	</section>
@endsection

@push ('after-scripts')
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="http://platform.twitter.com/widgets.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
@endpush