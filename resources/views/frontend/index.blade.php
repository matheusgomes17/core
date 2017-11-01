@extends('frontend.layouts.app')

@section('content')
    <section class="slider-section">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators slider-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <h1 class="hidden">Conheça o Criatório Chideroli</h1>
            <div class="carousel-inner" role="listbox">
                <article class="item active">
                    <img src="img/slider.jpg" width="1648" height="600" alt="">

                    <div class="carousel-caption">
                        <h1><b>INDIO GIGANTE</b> CHIDEROLI</h1>

                        <p>UM CRIATÓRIO DE <span>MONSTROS!</span></p>
                        <a href="#">Veja mais</a>
                    </div>
                </article>
                <article class="item">
                    <img src="img/slider2.jpg" width="1648" height="600" alt="">

                    <div class="carousel-caption">
                        <h1><b>INDIO GIGANTE</b> CHIDEROLI</h1>

                        <p>UM CRIATÓRIO DE <span>MONSTROS!</span></p>
                        <a href="#">Veja mais</a>
                    </div>
                </article>
                <article class="item ">
                    <img src="img/slider3.jpg" width="1648" height="600" alt="">

                    <div class="carousel-caption">
                        <h1><b>INDIO GIGANTE</b> CHIDEROLI</h1>

                        <p>UM CRIATÓRIO DE <span>MONSTROS!</span></p>
                        <a href="#">Veja mais</a>
                    </div>
                </article>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </section>

    @if ($madeHistory->count() > 0)
        <section class="new-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>FIZERAM HISTÓRIA</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($madeHistory as $history)
                        <div class="col-md-3 col-sm-6 wow fadeInLeft animated" data-wow-delay="0.2s">
                            @include ('frontend.includes.partials.product_item', ['model' => $history])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (getMenuCategories()->count() > 0)
        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>O CRIATÓRIO</h1>
                        </div>
                    </div>
                </div>

                @foreach(getMenuCategories() as $menuCategories)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter-menu">
                                <ul class="button-group sort-button-group">
                                    <li class="button active" data-category="all">
                                        Todos<span>{{ $products->count() }}</span></li>
                                    @foreach($menuCategories->children as $subMenuCategories)
                                        <li class="button" data-category="cat-{{ $subMenuCategories->id }}">
                                            {{ $subMenuCategories->name }}
                                            <span>{{ $subMenuCategories->products->count() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row featured isotope">
                    @foreach ($reprodutores as $reprodutor)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $reprodutor->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $reprodutor])
                        </div>
                    @endforeach
                    @foreach ($matrizes as $matriz)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $matriz->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $matriz])
                        </div>
                    @endforeach
                    @foreach ($frangos as $frango)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $frango->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $frango])
                        </div>
                    @endforeach
                    @foreach ($frangas as $franga)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $franga->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $franga])
                        </div>
                    @endforeach
                    @foreach ($pintinhos as $pintinho)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $pintinho->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $pintinho])
                        </div>
                    @endforeach
                    @foreach ($ovos as $ovo)
                        <div class="col-md-3 col-sm-6 col-xs-12 cat-{{ $ovo->id }} featured-items isotope-item">
                            @include ('frontend.includes.partials.product_item', ['model' => $ovo])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="offer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown animated ">
                    <h1>OS MELHORES ANIMAIS</h1>

                    <h2>Da região de São Paulo</h2>
                </div>
            </div>
        </div>
    </section>

    @if ($featured->count() > 0)
        <section class="best-seller-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Prêmiados</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($featured as $feature)
                        <div class="col-md-3 col-sm-6 wow fadeInDown animated" data-wow-delay="0.2s">
                            @include ('frontend.includes.partials.product_item', ['model' => $feature])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($depositions->count() > 0)
    <section class="review-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>Depoimentos</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="feedback" class="carousel slide feedback" data-ride="feedback">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach ($depositions as $deposition)
                        <div class="item active">
                            <div class="carousel-caption">
                                <p>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $deposition->link }}" frameborder="0" allowfullscreen></iframe>
                                </p>
                                <h3>- {{ $deposition->name }} -</h3>
                                <span>{{ $deposition->cityAndState }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators review-controlar">
                        @foreach ($depositions as $deposition)
                        <li data-target="#feedback" data-slide-to="{{ $deposition->id-1 }}" class="active">
                            <img src="{{ asset($deposition->cover) }}" width="320" height="439" alt="{{ $deposition->name }}">
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
