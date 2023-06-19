<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Session;

class ProductoController extends Controller
{
     //listado
     public function index(){
        $productos = Producto::whereSubcategoria_id(Session::get("subcategoria_id"))->get();
        return view('admin.producto.index',compact('productos'));
    }


    //insertar
    public function create(){
        return view('admin.producto.create');
    }
    public function store(Request $request){
        $producto  =   new Producto($request->all());
        if ($request->hasFile('seo_image')){
            $file   =   $request->file('seo_image');            
            $nombre =   $file->getClientOriginalName();
            $file->move(public_path('img/producto/'),$nombre);
            $producto->seo_image = $nombre;
        }
        if ($request->hasFile('image')){
            $file   =   $request->file('image');            
            $nombre =   $file->getClientOriginalName();
            $file->move(public_path('img/producto/'),$nombre);
            $producto->image = $nombre;
        }
       
        $producto->publicado = $request->publicado ? 1 : 0;
        $producto->subcategoria_id = Session::get("subcategoria_id");
        $producto->save();
        return redirect()->route('producto.index');
    }
    //actualizar
    public function edit($id){
        $producto     =   Producto::findOrFail($id);
        return view('admin.producto.edit',compact('producto'));
    }
    public function update(Request $request,$id){
        $producto            =   Producto::findOrFail($id);
        $seo_imageanterior    =   $producto->seo_image;
        $imageanterior        =   $producto->image;
        

        $producto->fill($request->all());
        if ($request->hasFile('seo_image')){
            $rutaAnterior = public_path("img/producto/".$seo_imageanterior);
            if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('seo_image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/producto/'),$nombre);
            $producto->seo_image = $nombre;
        }

        if ($request->hasFile('image')){
            $rutaAnterior = public_path("img/producto/".$imageanterior);
            if ((file_exists($rutaAnterior)) && ($imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/producto/'),$nombre);
            $producto->image = $nombre;
        }

        
        $producto->publicado   =   $request->publicado ? 1 : 0;
            
        $producto->save();
        return redirect()->route('producto.index');
    }

    //eliminar
    public function destroy($id){
        $producto      =   Producto::findOrFail($id);
        $rutaAnterior   =   public_path("img/producto/".$producto->seo_image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $rutaAnterior = public_path("img/producto/".$producto->image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
