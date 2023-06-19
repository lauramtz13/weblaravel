<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    //listado
    public function index(){
        $empresas = Empresa::all();
        return view('admin.empresa.index',compact('empresas'));
    }


    //insertar
    public function create(){          }
    public function store(Request $request){       }
    //actualizar
    public function edit($id){
        $empresa     =   Empresa::findOrFail($id);       
        return view('admin.empresa.edit',compact('empresa'));
    }
    public function update(Request $request,$id){
        $empresa            =   Empresa::findOrFail($id);
        $seo_imageanterior    =   $empresa->seo_image;
        $imageanterior        =   $empresa->image;
        

        $empresa->fill($request->all());
        if ($request->hasFile('seo_image')){
            $rutaAnterior = public_path("img/empresa/".$seo_imageanterior);
            if ((file_exists($rutaAnterior)) && ($seo_imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('seo_image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/empresa/'),$nombre);
            $empresa->seo_image = $nombre;
        }

        if ($request->hasFile('image')){
            $rutaAnterior = public_path("img/empresa/".$imageanterior);
            if ((file_exists($rutaAnterior)) && ($imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/empresa/'),$nombre);
            $empresa->image = $nombre;
        }      
        $empresa->save();
        return redirect()->route('empresa.index');
    }

    //eliminar
    public function destroy($id){
        $empresa      =   Empresa::findOrFail($id);
        $rutaAnterior   =   public_path("img/empresa/".$empresa->seo_image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $rutaAnterior = public_path("img/empresa/".$empresa->image);
        if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
        $empresa->delete();
        return redirect()->route('empresa.index');
    }

}
