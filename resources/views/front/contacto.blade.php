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
                <h3 class="text-primary">CONTACTO</h3>
            </div>
        </div>
    </div>

    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-sm-9 pt-5 pb-5">
            <div class="p-3 bg-light mt-3 mb-3 border">
                <p>RAZÓN SOCIAL: {{$config->_razonsocial}}</p>
            </div>
            <div class="p-3 bg-light mt-3 mb-3">
                <p>EMAIL: {{$config->_email}}</p>
            </div>
            <div class="p-3 bg-light mt-3 mb-3">
                <p>TELEFONO: {{$config->_celular}}</p>
            </div>
            <div class="p-3 bg-light mt-3 mb-3">
                <p>DIRECCION: {{$config->_direccion}}</p>
            </div>
            <div class="p-3 bg-light mt-3 mb-3">
                <p>EMAIL: {{$config->_email}}</p>
            </div>

            <div class="p-3 bg-light mt-3 mb-3">
                <ul>
                    @if (!empty($config->link_facebook))
                    <li><a href="{{$config->link_facebook}}" target="_blank" >Facebook</a></li>
                    @endif
                    @if (!empty($config->link_instagram))
                    <li><a href="{{$config->link_instagram}}" target="_blank" >Instagram</a></li>
                    @endif

                </ul>
            </div>

            <hr>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d197294.4734121557!2d-0.5015971494999006!3d39.40770125010841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia%2C%20Espa%C3%B1a!5e0!3m2!1ses-419!2spe!4v1650214627484!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



        </div>
        <div class="col-sm-3">
            PROMOCION
        </div>
    </div>
</div>
@endsection
