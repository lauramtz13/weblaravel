@extends('layouts.app')
@section('content')
<div class="container">    
    <div class="row">
        @include('admin.sidebar')
        <div class="col-sm-10 p-5 bg-light">
        <h1 class="fw-bold fs-3">EDITAR SUBCATEGORIA</h1>      
        {!! Form::open(['route'=>['subcategoria.update',$subcategoria],'method'=>'PUT','files'=>true]) !!}                 
        <div class="card bg-white">
            <div class="card-body">
                <p>SEO</p>
                <div class="form-group row">
                    <div class="col-sm-4">
                        {!! Form::label('slug','SLUG') !!}
                        {!! Form::text('slug',$subcategoria->slug,['class'=>'form-control','required']) !!}
                    </div>  
                    <div class="col-sm-8">              
                        {!! Form::label('seo_title','TITLE') !!}
                        {!! Form::text('seo_title',$subcategoria->seo_title,['class'=>'form-control','required','maxlength'=>'60']) !!}
                    </div>
                </div>      
                <div class="form-group">
                    {!! Form::label('seo_description','DESCRIPTION') !!}
                    {!! Form::textarea('seo_description',$subcategoria->seo_description,['class'=>'form-control','maxlength'=>'155','rows'=>'2']) !!}
                </div>      
            </div>
        </div>
                
        <div class="form-group row mt-5">
            <div class="col-sm-9">
                {!! Form::label('name','NOMBRE') !!}
                {!! Form::text('name',$subcategoria->name,['class'=>'form-control','required']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('orden','ORDEN') !!}
                {!! Form::number('orden',$subcategoria->orden,['class'=>'form-control','required']) !!}
            </div>
        </div>               

        <div class="form-group mt-5">
            {!! Form::label('description','DESCRIPCIÓN') !!}
            {!! Form::textarea('description',$subcategoria->description,['class'=>'form-control']) !!}
            <script>CKEDITOR.replace("description");</script>
        </div>  
        
        
        
        <div class="form-group mt-5">
            {!! Form::label('seo_image','SEO IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/subcategoria/{{$subcategoria->seo_image}}" class="img-fluid ">
            {!! Form::file('seo_image',['class'=>'form-control']) !!}
        </div>
        <div class="form-group mt-5">
            {!! Form::label('image','IMAGE',['class'=>'control-label']) !!}<br>
            <img src="/img/subcategoria/{{$subcategoria->image}}" class="img-fluid">
            {!! Form::file('image',['class'=>'form-control']) !!}
        </div>  

        <div class="form-group p-2 mt-5">            
            <div class="form-check form-switch">                
                {!! Form::checkbox("portada", null, $subcategoria->portada,["class"=>"form-check-input"]) !!}                
                {!! Form::label('portada','Portada',["class"=>"form-check-label"]) !!}  
            </div>
        </div>
      
        <div class="form-group p-2 mt-5">            
            <div class="form-check form-switch">                
                {!! Form::checkbox("publicado", null, $subcategoria->publicado,["class"=>"form-check-input"]) !!}                
                {!! Form::label('publicado','Publicado',["class"=>"form-check-label"]) !!}  
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