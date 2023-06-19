<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '67 caracteres...')</title>
    <meta name="description" content="@yield('description', '155 caracteres...')">
    <meta property="og:title" content="@yield('title', '67 caracteres...')"/>
    <meta property="og:type" content="website" />
    <meta property="og:description" content="@yield('description', '155 caracteres')"/>
    <meta property="og:url" content="@yield('url', 'https://weblaravel.com')"/>
    <meta property="og:image" content="@yield('image', 'https://weblaravel.com/img/config/'.$config->seo_image)" />
    <link href="@yield('url', 'https://weblaravel.com')" rel="canonical" />
    <link rel="shortcut icon" href="{{ asset('img/config/'.$config->_favicon) }}" type="image/png" />

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>.bg-warning{background: #6979d8 !important}</style>
</head>
<body>
    <div class="container-fluid bg-dark p-2">
        <div class="row justify-content-end">
            <div class="col-sm-3 text-end">
                <!--icon carrito-->
                <a href="/store/cart-checkout" class="position-relative me-4 text-decoration-none text-white" rel="nofollow" >
                    Carrito <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{Cart::getContent()->count()}}
                    </span>
                </a>
                <!--/icon carrito-->
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" rel="nofollow" class="text-decoration-none text-white">Login</a>
                    @endif
                @else
                    <a href="{{ route('logout') }}" rel="nofollow"  class="text-decoration-none text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Salir </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest

            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark bg-warning shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}" title="Inicio"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link" href="/" title="Página Inicio">Inicio</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" title="Artículos de cómputo" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Productos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($menu as $i)
                                <li><a class="dropdown-item" href="/{{$i->slug}}" title="{{$i->name}}">{{$i->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/blog" title="Blog">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="/contacto" title="Datos de contacto">Contacto</a></li>
                            <li class="nav-item"><a class="nav-link" href="/empresa" title="Empresa">Empresa</a></li>
                        </ul>
                    </div>
                </div>
    </nav>
    @yield('content')
<!-- pie-->
<div class="container-fluid bg-dark">
    <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-3 row justify-content-center ">
                <ul>
                    <li><a class="text-secondary" href="/empresa">Empresa</a></li>
                    <li><a class="text-secondary" href="/contacto">Contacto</a></li>
                    <li><a class="text-secondary" href="/blog">Blog</a></li>
                    <li><a class="text-secondary" href="/terminos">Términos y condiciones</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <ul>
                    <li class="text-secondary">{{$config->_email}}</li>
                    <li class="text-secondary">{{$config->_direccion}}</li>
                    <li class="text-secondary">{{$config->_celular}}</li>
                </ul>
            </div>
            <div class="col-sm-12 border-top p-3">
                <p class="text-center small text-secondary">&copy; Todos los derechos reservados | WebLaravel |</p>
            </div>
        </div>
    </div>
</div>
<!-- /pie-->
</body>
</html>

