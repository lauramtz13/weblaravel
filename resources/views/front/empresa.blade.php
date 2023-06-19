@extends('layouts.page')
@section('title'){{"Contacto con Weblaravel...67 caracteres".$config->_razonsocial}}@endsection
@section('description'){{"Ubícanos en Av. .... 155 caracteres"}}@endsection
@section('image'){{"/img/contacto.jpg"}}@endsection
@section('url'){{"https://weblaravel.com/contacto"}}@endsection
@section('content')
<div class="container-fluid bg-dark">
    <div class="container">
        <!--HEADER-->
    <div class="col-sm-12 p-3">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="text-primary">EMPRESA</h3>
            </div>
        </div>
    </div>

    </div>
</div>

<div class="container">
    <div class="row m-5">
        <div class="col-sm-9 pt-2 p-2">
            <img src="/img/empresa/{{$empresa->image}}" alt="{{$config->_razonsocial}}" class="img-fluid">
            <div class="p-5 bg-light">
                {!!$empresa->description!!}
            </div>
        </div>
        <div class="col-sm-3">
            PROMOCION
        </div>
    </div>
</div>
@endsection
