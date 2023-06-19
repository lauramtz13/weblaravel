<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;
class CategoriaController extends Controller
{
    //listado
    public function index(){
        $categorias = Categoria::all();
        return view('admin.categoria.index',compact('categorias'));
    }


    //insertar
    public function create(){
        return view('admin.categoria.create');
    }
    public function store(Request $request){
        $categoria  =   new Categoria($request->all());
        if ($request->hasFile('seo_image')){
            $file   =   $request->file('seo_image');            
            $nombre =   $file->getClientOriginalName();
            $file->move(public_path('img/categoria/'),$nombre);
            $categoria->seo_image = $nombre;
        }
        if ($request->hasFile('image')){
            $file   =   $request->file('image');            
            $nombre =   $file->getClientOriginalName();
            $file->move(public_path('img/categoria/'),$nombre);
            $categoria->image = $nombre;
        }
        $categoria->portada = $request->portada ? 1 : 0;
        $categoria->publicado = $request->publicado ? 1 : 0;
        
        $categoria->save();
        return redirect()->route('categoria.index');
    }
    //actualizar
    public function edit($id){
        $categoria     =   Categoria::findOrFail($id);
        return view('admin.categoria.edit',compact('categoria'));
    }
    public function update(Request $request,$id){
        $categoria            =   Categoria::findOrFail($id);
        $seo_imageanterior    =   $categoria->seo_image;
        $imageanterior        =   $categoria->image;
        

        $categoria->fill($request->all());
        if ($request->hasFile('seo_image')){
            $rutaAnterior = public_path("img/categoria/".$seo_imageanterior);
            if ((file_exists($rutaAnterior)) && ($seo_imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('seo_image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/categoria/'),$nombre);
            $categoria->seo_image = $nombre;
        }

        if ($request->hasFile('image')){
            $rutaAnterior = public_path("img/categoria/".$imageanterior);
            if ((file_exists($rutaAnterior)) && ($imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/categoria/'),$nombre);
            $categoria->image = $nombre;
        }

        $categoria->portada     =   $request->portada ? 1 : 0;
        $categoria->publicado   =   $request->publicado ? 1 : 0;
            
        $categoria->save();
        return redirect()->route('categoria.index');
    }

    //eliminar
    public function destroy($id){
        $categoria      =   Categoria::findOrFail($id);
        $rutaAnterior   =   public_path("img/categoria/".$categoria->seo_image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $rutaAnterior = public_path("img/categoria/".$categoria->image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $categoria->delete();
        return redirect()->route('categoria.index');
    }

    public function show($id){
        Session::put("categoria_id",$id);
        return redirect('admin/subcategoria');
    }

}
