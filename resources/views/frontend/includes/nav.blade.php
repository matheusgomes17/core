<header class="header-section">
    <div class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Alternar de navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('frontend.index') }}" title=""><img src="{{ asset('img/logo.png') }}" width="75px" alt=""></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                @if(getMenuCategories()->count() > 0)
                    @foreach(getMenuCategories() as $menu)
                        <ul class="nav navbar-nav">
                            @foreach($menu->children as $subMenu)
                                <li>
                                    <a title="{{ $subMenu->name }}"
                                       href="{{ route('frontend.category', $subMenu->slug) }}">
                                        {{ $subMenu->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                @endif
                <ul class="nav navbar-nav navbar-right cart-menu">
                    <li>
                        <a href="{{ route('frontend.gallery') }}" data-toggle="tooltip" data-placement="bottom" title="Galeria de Imagens">
                            <i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#contact_footer" data-toggle="tooltip" data-placement="bottom" title="Entre em Contato">
                            <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="search-btn" data-toggle="tooltip" data-placement="bottom" title="Faça uma Pesquisa">
                            <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </div>
</header>

<div class="search-section">
    <div class="container">
        <div class="row subscribe-from">
            <div class="col-md-12">
                {{ Form::open(['route' => 'frontend.search', 'class' => 'form-inline col-md-12 wow fadeInDown animated', 'role' => 'form', 'method' => 'POST']) }}
                <div class="form-group">
                    <input type="text" class="form-control subscribe" name="pesquisa" placeholder="Digite aqui a sua pesquisa..." autofocus>
                    <button type="submit" class="suscribe-btn"><i class="pe-7s-search"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div><!-- end of/. row -->
    </div><!-- end of /.container -->
</div><!-- end of /.news letter section -->