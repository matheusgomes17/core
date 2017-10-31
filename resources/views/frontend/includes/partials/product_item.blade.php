<div class="product-item" itemscope itemtype="https://schema.org/Product">
    <img src="{{ asset($model->cover) }}" class="img-responsive" width="255" height="322" alt="">
    <div class="product-title">
        <a href="{{ route('frontend.product', $model->slug) }}" itemprop="url">
            <h3 itemprop="name">{{ $model->name }}</h3>
            <span><i class="fa fa-eye fa-lg"></i></span>
        </a>
    </div>
</div>