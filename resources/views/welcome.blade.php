@extends('layouts.page')

@section('content')
<!-- carrusel-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($imgs as $img)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->iteration}}" class="{{($loop->first) ? 'active':''}}"  aria-current="true" aria-label="Slide 1"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($imgs as $img)
        <div class="{{($loop->first) ? 'carousel-item active':'carousel-item'}}">
            <img src="/img/carrusel/{{$img->image}}" class="d-block w-100" alt="{{$img->name}}" title="{{$img->name}}">
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<!--/ carrusel-->
<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-sm-12 mt-5 mb-5">
            <h1 class="text-center">{{$config->_slogan}}</h1>
        </div>
        @foreach ($categorias as $c)
        <div class="col-sm-4 mt-4 mb-4">
            <div class="card">
                <img src="/img/categoria/{{$c->image}}" class="card-img-top" loading="lazy" title="{{$c->name}}" alt="{{$c->name}}">
                <div class="card-footer">
                    <a href="/{{$c->slug}}" class="btn btn-success d-block">{{$c->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197294.4734121557!2d-0.5015971494999006!3d39.40770125010841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia%2C%20Espa%C3%B1a!5e0!3m2!1ses-419!2spe!4v1650214627484!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-sm-6 bg-dark">
            @foreach ($posts as $p)
                <div class="m-2 p-2">
                    <h2 class="fs-4"><a href="/blog/{{$p->slug}}" title="{{$p->name}}" class="text-decoration-none text-while">{{$p->name}}</a></h2>
                    <p class="text-secondary">{{$p->seo_description}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
