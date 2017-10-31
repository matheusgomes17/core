@extends('frontend.layouts.app')

@section('content')
    <section class="new-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated">
                        <h1>Pesquisa</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	@if ($products->count() > 0)
		                <div class="text-center">
	            			<p style="font-size: 1.6em; margin-bottom: 20px;">Sua pesquisa por <b><u>{{ $keyword }}</u></b> resultou em {{ $products->count() }} @if ($products->count() == 1) resultado @else resultados @endif</p>
	        			</div>

	                    @foreach ($products as $product)
		                    <div class="col-md-3 col-sm-8 wow fadeInLeft animated" data-wow-delay="0.2s">
		                        @include ('frontend.includes.partials.product_item', ['model' => $product])
		                    </div>
	                    @endforeach
	                @else
		                <div class="text-center">
		                	<p style="font-size: 2em"><i class="fa fa-close" style="color: red"></i> Não foi encontrado nenhum resultado para <b style="color: #ed6a6a;"><u>{{ $keyword }}</u></b></p>
		                </div>
	                @endif
                </div>
            </div>
        </div>
    </section>
@endsection
