@extends('layouts.page')
@section('content')
<div class="container-fluid bg-dark">
    <div class="container">
        <!--HEADER-->
        <div class="col-sm-12 p-3">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-primary">BLOG</h3>
                </div>
                <div class="col-sm-6">
                    <input type="search" id="textoabuscar" placeholder="Buscar producto:" class="form-control rounded-pill">
                </div>
            </div>
        </div>
        <!-- /HEADER-->
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" id="resultados">
           @foreach ($blogs as $b)
           <div class="row border bg-light pt-3 pb-3 mb-4 mt-4">
               <div class="col-sm-5">
                    <a href="/blog/{{$b->slug}}">
                        <img src="/img/blog/{{$b->image}}" alt="{{$b->name}}" title="{{$b->name}}" loading="lazy" class="img-fluid" >
                    </a>
               </div>
               <div class="col-sm-7">
                   <h2 class="fs-4"><a href="/blog/{{$b->slug}}">{{$b->name}}</a></h2>
                   <p>{{$b->seo_description}}</p>
               </div>
           </div>

           @endforeach
        </div>
        <div class="col-sm-3">
            PROMOCION
        </div>
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
