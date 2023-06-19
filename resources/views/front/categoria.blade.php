@extends('layouts.page')
@section('title'){{$categoria->seo_title}}@endsection
@section('description'){{$categoria->seo_description}}@endsection
@section('image'){{"/img/categoria/".$categoria->seo_image}}@endsection
@section('url'){{"https://weblaravel.com/".$categoria->slug}}@endsection
@section('content')
<div class="container-fluid bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <!--NOMBRE CATEGORIA-->
            <div class="col-sm-12 p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="text-primary">{{$categoria->name}}</h3>
                    </div>
                    <div class="col-sm-6">
                        <input type="search" id="textoabuscar" placeholder="Buscar producto:" class="form-control rounded-pill">
                    </div>
                </div>
            </div>
            <!-- /NOMBRE CATEGORIA-->
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
        <!-- CATEGORIA-->
        <div class="col-sm-9" id="resultados">
                @foreach ($categoria->subcategorias as $subcategoria)
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="text-primary fs-4">{{$subcategoria->name}}</h2>
                        </div>
                        @forelse ($subcategoria->productos as $p)
                        <div class="col-sm-4 mt-4 mb-4">
                            <div class="card">
                                <img src="/img/producto/{{$p->image}}" class="card-img-top" loading="lazy" title="{{$p->name}}" alt="{{$p->name}}">
                                <div class="card-body text-center">
                                    <p class="fs-5">{{$p->name}}</p>
                                    <p class="fs-5">USD {{$p->precio}} <sup class="text-secondary text-decoration-line-through">{{$p->precio_anterior}}</sup></p>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-6 p-0">
                                            <a href="/producto/{{$p->slug}}" title="{{$p->name}}" class="btn btn-success d-block">Ver más</a>
                                        </div>
                                        <div class="col-sm-6 p-0">
                                            <form method="POST" action="{{route('cart.add')}}">
                                                @csrf
                                                <input name="id" type="hidden" value="{{$p->id}}">
                                                <button class="btn btn-danger w-100" type="submit">AGREGAR</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                @endforeach
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
