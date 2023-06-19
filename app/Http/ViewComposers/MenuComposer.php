<?php 
namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Models\Config;
use App\Models\Categoria;

class MenuComposer{

	public function compose(View $view){
        $config = Config::find(1);
        $menu   = Categoria::orderBy('name','desc')->get(['slug','name']);
        $view->with("config",$config)->with("menu",$menu);
    }

}
?>