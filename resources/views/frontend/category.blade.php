@extends('frontend.layouts.app')

@section('content')
    <div class="new-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated">
                        <p>{{ $category->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 wow fadeInLeft animated">
                    @if(getMenuCategories()->count() > 0)
                    <aside class="widget widget-categories">
                        <h1 class="sidebar-title">Categorias</h1>
                        @foreach(getMenuCategories() as $menu)
                        <ul class="sidebar-menu">
                            @foreach($menu->children as $subMenu)
                            <li><a href="{{ route('frontend.category', $subMenu->slug) }}"title="{{ $subMenu->name }}">
                                    {{ $subMenu->name }}</a> <span class="count">({{ $subMenu->products->count() }})</span></li>
                            @endforeach
                        </ul>
                        @endforeach
                    </aside>
                    @endif
                </div>
                <section class="col-md-9">
                    <h1 class="hidden">Veja os animais da categoria {{ $category->name }}</h1>
                    @if ($category->products->count() > 0)
                        @foreach ($products as $product)
                            <div class="col-md-4 col-sm-8 wow fadeInLeft animated" data-wow-delay="0.2s">
                                @include ('frontend.includes.partials.product_item', ['model' => $product])
                            </div>
                        @endforeach
                    @elseif (is_null($category->parent))
                        @foreach ($products as $product)
                            <div class="col-md-4 col-sm-8 wow fadeInLeft animated" data-wow-delay="0.2s">
                                @include ('frontend.includes.partials.product_item', ['model' => $product])
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 wow fadeInLeft animated" data-wow-delay="0.2s">
                            <div class="product-item">
                                 <div class="">Não existem produtos cadastrados nesta categoria!</div>
                            </div>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection