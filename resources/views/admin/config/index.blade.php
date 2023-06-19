@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">EDITAR</h1>      
        {!! Form::open(['route'=>['config.update',$config],'method'=>'PUT','files'=>true]) !!}                 
        <div class="card bg-white">
            <div class="card-body">
                <p>SEO</p>
                <div class="form-group row">
                    
                    <div class="col-sm-|1">              
                        {!! Form::label('seo_title','TITLE') !!}
                        {!! Form::text('seo_title',$config->seo_title,['class'=>'form-control','required','maxlength'=>'60']) !!}
                    </div>
                </div>      
                <div class="form-group">
                    {!! Form::label('seo_description','DESCRIPTION') !!}
                    {!! Form::textarea('seo_description',$config->seo_description,['class'=>'form-control','maxlength'=>'155','rows'=>'2']) !!}
                </div>      
            </div>
        </div>
                
        <div class="form-group row mt-5">
            <div class="col-sm-6">
                {!! Form::label('_slogan','SLOGAN') !!}
                {!! Form::text('_slogan',$config->_slogan,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('_razonsocial','RAZÓN SOCIAL') !!}
                {!! Form::text('_razonsocial',$config->_razonsocial,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('_email','EMAIL') !!}
                {!! Form::text('_email',$config->_email,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('_direccion','DIRECCIÓN') !!}
                {!! Form::text('_direccion',$config->_direccion,['class'=>'form-control','required']) !!}
            </div>
            
            <div class="col-sm-3">
                {!! Form::label('_celular','CELULAR') !!}
                {!! Form::tel('_celular',$config->_celular,['class'=>'form-control','required']) !!}
            </div>
        </div>               




        
        
        
        <div class="form-group mt-5">
            {!! Form::label('seo_image','SEO IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/config/{{$config->seo_image}}" class="img-fluid ">
            {!! Form::file('seo_image',['class'=>'form-control']) !!}
        </div>
        <div class="form-group mt-5">
            {!! Form::label('_logo','_logo (200x200px)',['class'=>'control-label']) !!}<br>
            <img src="/img/config/{{$config->_logo}}" class="img-fluid">
            {!! Form::file('_logo',['class'=>'form-control']) !!}
        </div>  

        <div class="form-group mt-5">
            {!! Form::label('_favicon','_favicon (16x16px)',['class'=>'control-label']) !!}<br>
            <img src="/img/config/{{$config->_favicon}}" class="img-fluid">
            {!! Form::file('_favicon',['class'=>'form-control']) !!}
        </div>  

        <div class="form-group row mt-5">
            <div class="col-sm-6">
                {!! Form::label('link_facebook','FACEBOOK') !!}
                {!! Form::text('link_facebook',$config->link_facebook,['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('link_whatsapp','WHATAPP') !!}
                {!! Form::text('link_whatsapp',$config->link_whatsapp,['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('link_tiktok','TIKTOK') !!}
                {!! Form::text('link_tiktok',$config->link_tiktok,['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('link_instagram','INTAGRAM') !!}
                {!! Form::text('link_instagram',$config->link_instagram,['class'=>'form-control']) !!}
            </div>
           
        </div>            
              
       

        <div class="form-group mt-5">
            {{ Form::submit('EDITAR',['class'=>'btn btn-primary']) }}
        </div>

        {!! Form::close() !!}
        </div>  
    </div>
</div>
@endsection