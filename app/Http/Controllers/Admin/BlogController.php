<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Producto;

class BlogController extends Controller
{
        //listado
        public function index(){
            $blogs = Blog::all();
            return view('admin.blog.index',compact('blogs'));
        }
    
    
        //insertar
        public function create(){
            $productos = Producto::orderBy("name")->pluck("name","id");
            return view('admin.blog.create', compact("productos"));
        }
        public function store(Request $request){
            $blog  =   new blog($request->all());
            if ($request->hasFile('seo_image')){
                $file   =   $request->file('seo_image');            
                $nombre =   $file->getClientOriginalName();
                $file->move(public_path('img/blog/'),$nombre);
                $blog->seo_image = $nombre;
            }
            if ($request->hasFile('image')){
                $file   =   $request->file('image');            
                $nombre =   $file->getClientOriginalName();
                $file->move(public_path('img/blog/'),$nombre);
                $blog->image = $nombre;
            }
           
            $blog->publicado = $request->publicado ? 1 : 0;
            
            $blog->save();
            return redirect()->route('blog.index');
        }
        //actualizar
        public function edit($id){
            $blog     =   Blog::findOrFail($id);
            $productos = Producto::orderBy("name")->pluck("name","id");
            return view('admin.blog.edit',compact('blog','productos'));
        }
        public function update(Request $request,$id){
            $blog            =   Blog::findOrFail($id);
            $seo_imageanterior    =   $blog->seo_image;
            $imageanterior        =   $blog->image;
            
    
            $blog->fill($request->all());
            if ($request->hasFile('seo_image')){
                $rutaAnterior = public_path("img/blog/".$seo_imageanterior);
                if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
                $file   =   $request->file('seo_image');            
                $nombre =   time().$file->getClientOriginalName();
                $file->move(public_path('img/blog/'),$nombre);
                $blog->seo_image = $nombre;
            }
    
            if ($request->hasFile('image')){
                $rutaAnterior = public_path("img/blog/".$imageanterior);
                if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
                $file   =   $request->file('image');            
                $nombre =   time().$file->getClientOriginalName();
                $file->move(public_path('img/blog/'),$nombre);
                $blog->image = $nombre;
            }
                
            $blog->publicado   =   $request->publicado ? 1 : 0;
                
            $blog->save();
            return redirect()->route('blog.index');
        }
    
        //eliminar
        public function destroy($id){
            $blog      =   Blog::findOrFail($id);
            $rutaAnterior   =   public_path("img/blog/".$blog->seo_image);
            if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
            $rutaAnterior = public_path("img/blog/".$blog->image);
            if (file_exists($rutaAnterior)) {unlink (realpath($rutaAnterior));}
            $blog->delete();
            return redirect()->route('blog.index');
        }
    
      
}
