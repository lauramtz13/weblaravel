<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Blog;
use App\Models\Producto;
use App\Models\Empresa;

class FrontController extends Controller
{
    public function index(){
        $imgs = Carrusel::all();
        $categorias = Categoria::orderByDesc("orden")->take(3)->get(["slug","name","image"]);
        $posts = Blog::orderByDesc("visitas")->take(3)->get(["slug","name","seo_description"]);
        return view('welcome',  compact("imgs","categorias","posts"));
    }
    public function categoria(Categoria $categoria){
        $categorias = Categoria::all();
        return view('front.categoria', compact("categoria","categorias"));
    }

    public function subcategoria(Categoria $categoria, Subcategoria $subcategoria){
        $categorias = Categoria::all();
        return view('front.subcategoria', compact("subcategoria","categorias"));
    }

    public function producto(Producto $producto){
        $categorias = Categoria::all();
        $posts = Blog::orderByDesc("visitas")->take(3)->get(["slug","name","seo_description"]);
        $productos = Producto::orderByDesc("visitas")->take(3)->get();
        return view('front.producto', compact("posts","productos","categorias","producto"));
    }

    public function buscador(Request $request){

        $data = ["success"=>false];
        if($request->ajax()){
            $lista = Producto::where("name","like","%".$request->texto."%")->get(["slug","name"]);
            $data = [
                "success"=>true,
                "lista" => $lista
            ];
        }

        return response()->json($data, 200);
    }


    public function blog(){
        $blogs = Blog::get(["slug","name","image","seo_description"]);
        return view('front.blog.index', compact("blogs"));
    }

    public function post(Blog $blog){
        $blog->increment("visitas");
        return view('front.blog.post', compact("blog"));
    }

    public function empresa(){
        $empresa = Empresa::find(1);
        return view('front.empresa', compact("empresa"));
    }

}
