<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use Session;
use PDF;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user            =   User::findOrFail($id);
        $user->estado   =   $request->estado? 1 : 0;
        $user->save();
        return redirect()->route('user.index');
    }

    public function show($id){
        Session::put("pedido_id",$id);
        return redirect('admin/detalle');
    }

    public function generarpdf($id){
        $user = User::find($id);
        $pdf = PDF::loadView("admin.user.pdf",compact("user"));
        return $pdf->download($user->name."-lista-de-pedidos.pdf");

    }
    

}
