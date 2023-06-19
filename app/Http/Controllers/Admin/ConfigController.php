<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index(){
        $config = Config::find(1);
        return view('admin.config.index',compact('config'));
    }
    public function update(Request $request,$id){
        $config            =   Config::findOrFail($id);
        $seo_imageanterior    =   $config->seo_image;
        $_logoanterior        =   $config->_logo;
        $_faviconanterior        =   $config->_favicon;

        $config->fill($request->all());
        if ($request->hasFile('seo_image')){
            $rutaAnterior = public_path("img/config/".$seo_imageanterior);
            if ((file_exists($rutaAnterior)) && ($seo_imageanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('seo_image');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/config/'),$nombre);
            $config->seo_image = $nombre;
        }

        if ($request->hasFile('_logo')){
            $rutaAnterior = public_path("img/config/".$_logoanterior);
            if ((file_exists($rutaAnterior)) && ($_logoanterior!=null)){unlink (realpath($rutaAnterior));}
            $file   =   $request->file('_logo');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/config/'),$nombre);
            $config->_logo = $nombre;
        }
        if ($request->hasFile('_favicon')){
            $rutaAnterior = public_path("img/config/".$_faviconanterior);
            if ((file_exists($rutaAnterior)) && ($_faviconanterior!=null)) {unlink (realpath($rutaAnterior));}
            $file   =   $request->file('_favicon');            
            $nombre =   time().$file->getClientOriginalName();
            $file->move(public_path('img/config/'),$nombre);
            $config->_favicon = $nombre;
        }            
        $config->save();
        return redirect()->route('config.index');
    }


}
