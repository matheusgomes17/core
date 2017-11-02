@extends('frontend.layouts.app')

@section('content')
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
		                                <ul>
		                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
		                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
		                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		                                </ul>
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
                @foreach ($related as $history)
                    <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.2s">
                        @include ('frontend.includes.partials.product_item', ['model' => $history])
                    </div>
                @endforeach
            </div>
        </div>
	</section>
@endsection