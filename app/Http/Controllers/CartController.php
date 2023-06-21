<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle;

use Cart;
use Auth;

class CartController extends Controller
{
    public function add(Request $request){
       $producto = Producto::find($request->id);


       Cart::add(array(
        "id" => $producto->id,
        "name" => $producto->name,
        "price" => $producto->precio,
        "cantidad"=>$producto->cantidad,
        "quantity" => 1,
        "attributes" => array(
            "image" => $producto->image,
            "slug" => $producto->slug
            )
        ));

        return redirect()->back()->with("success_message","Producto $producto->name agregado!");


    }

    //mostrar carrito
    public function cart(){
        return view('front.cart');
    }
    // remover un producto del carrito
    public function removeitem(Request $request){
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    // limpiar el carrito
    public function clear(){
        Cart::clear();
        return back()->with('success',"Carrito de compra vacio!");
    }

    public function proceso(){

        if(Cart::getContent()->count()>0){
            $pedido = new Pedido();
            $pedido->subtotal   =   Cart::getSubTotal();
            $pedido->impuesto   =   Cart::getSubTotal() * 0.18 ;
            $pedido->total      =   Cart::getTotal() + Cart::getSubTotal() * 0.18;
            //$pedido->fecha= date("Y-m-d") ;
            $pedido->entregado  = 1;
            $pedido->user_id= Auth::user()->id;
            $pedido->save();

            $string="";
            foreach(Cart::getContent() as $c){
                $detalle = new Detalle();
                $detalle->cantidad =$c->quantity;
                $detalle->preciototal =$c->price * $c->quantity;
                $detalle->pedido_id =$pedido->id;
                $detalle->producto_id =$c->id;
                $detalle->save();

                $string .= "Producto: ".$c->name;
                $string .= "Cantidad: ".$c->quantity;
                $string .= "Precio: ".$c->price." | ";

            }

            Cart::clear();
            $string .="SUBTOTAL:".$pedido->subtotal ." | " ;
            $string .="IMPUESTO:".$pedido->impuesto ." | ";
            $string .="TOTAL:".$pedido->total ." | ";
            $string .="CLIENTE:".Auth::user()->name;

            echo "<script>window.location.href='https://api.whatsapp.com/send?phone=525635614496&text=".$string."'</script>";
        }else{
            return redirect()->back();
        }
    }
}
