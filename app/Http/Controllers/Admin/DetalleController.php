<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detalle;
use Session;

class DetalleController extends Controller
{
    public function index(){
        $detalles = Detalle::wherePedido_id(Session::get("pedido_id"))->get();
        return view('admin.detalle.index',compact('detalles'));
    }
}
