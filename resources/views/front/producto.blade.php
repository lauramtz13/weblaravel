@extends('layouts.page')
@section('title'){{$producto->seo_title}}@endsection
@section('description'){{$producto->seo_description}}@endsection
@section('image'){{"/img/producto/".$producto->seo_image}}@endsection
@section('url'){{"https://weblaravel.com/producto/".$producto->slug}}@endsection
@section('content')
<div class="container-fluid bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <!--NOMBRE producto-->
            <div class="col-sm-12 p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="text-warning">PRODUCTO</h3>
                    </div>
                    <div class="col-sm-6">
                        <input type="search" id="textoabuscar" placeholder="Buscar producto:" class="form-control rounded-pill">
                    </div>
                </div>
            </div>
            <!-- /NOMBRE producto-->
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <!--menu lateral-->
        <div class="col-sm-3">
            <ul class="list-group">
            @foreach ($categorias as $c)
                <li class="list-group-item"><a href="/{{$c->slug}}" class="text-decoration-none" title="{{$c->name}}">{{$c->name}}</a>
                    <ul class="list-group">
                    @forelse ($c->subcategorias as $sub)
                        <li class="list-group-item"><a href="/{{$c->slug}}/{{$sub->slug}}" class="text-decoration-none" {{$sub->name}}>{{$sub->name}}</a></li>
                    @empty
                    @endforelse
                    </ul>
                </li>
            @endforeach
            </ul>
        </div>
        <!-- /menu lateraL-->
        <!-- producto-->
        <div class="col-sm-9 pt-5 pb-5" id="resultados">
            <div class="row bg-light pt-5 pb-5">
                <div class="col-sm-6">
                    <img src="/img/producto/{{$producto->image}}" loading="lazy" title="{{$producto->name}}" alt="{{$producto->name}}" class="card-img-top">
                </div>
                <div class="col-sm-6">
                    <h2 class="fs-4 mt-3 mb-3 p-2 ">{{$producto->name}}</h2>
                    <p>COD: {{$producto->codigo}}</p>
                    <p>Cantidad: <input type="number" class="form-contro" placeholder="0"> </p>


                    <form method="POST" action="{{route('cart.add')}}">
                        @csrf
                        <input name="id" type="hidden" value="{{$producto->id}}" value="{{$producto->image}}">
                    <button class="btn btn-success btn-block" type="submit">AGREGAR AL CARRITO</button>



                </div>
                <div class="col-sm-12 p-2 bg-light">
                    {!!$producto->description!!}
                </div>
            </div>
            <!-- PRODUCTOS RELACIONADDOS-->
            <div class="row mt-5">
                <h2 class="fs-4 p-2">Productos relacionados</h2>
                @forelse ($productos as $p)
                <div class="col-sm-4 mt-4 mb-4">
                    <div class="card">
                        <img src="/img/producto/{{$p->image}}" loading="lazy" title="{{$producto->name}}" alt="{{$producto->name}}"  class="card-img-top">
                        <div class="card-body text-center">
                            <p class="fs-5">{{$p->name}}</p>
                            <p class="fs-5">USD {{$p->precio}} <sup class="text-secondary text-decoration-line-through">{{$p->precio_anterior}}</sup></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6 p-0">
                                    <a href="/producto/{{$p->slug}}" class="btn btn-success d-block">Ver más</a>
                                </div>
                                <div class="col-sm-6 p-0">
                                    <form method="POST" action="{{route('cart.add')}}">
                                        @csrf
                                        <input name="id" type="hidden" value="{{$producto->id}}">
                                        <button class="btn btn-danger btn-block" type="submit">AGREGAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse

            </div>

            <!-- publicaciones -->
            <div class="row bg-light mt-5">
                <div class="col-sm-12">
                    <h2 class="fs-4 m-2">Recomendaciones</h2>
                    @foreach ($posts as $p)
                        <div class="m-2 p-2">
                            <h2 class="fs-4"><a href="/blog/{{$p->slug}}" class="text-decoration-none text-while">{{$p->name}}</a></h2>
                            <p class="text-secondary">{{$p->seo_description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>



        </div>
        <!-- CATEGORIA-->


    </div>
</div>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    textoabuscar.addEventListener("keyup",e=>{
        var texto = e.target.value;
        if(texto.length>3){
            fetch("/buscador",{
                method:"post",
                body:JSON.stringify({texto : texto}),
                headers:{
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var html ="<h2>Resultados</h2>";
                for(var i in data.lista){
                    var enlace = '<a href="/producto/'+data.lista[i].slug+'" class="p-2 border-bottom">'+data.lista[i].name+'</a>';
                    html += enlace
                }
                resultados.innerHTML = html

            }).catch(error => console.error(error));

        }
    })
    </script>
@endsection
