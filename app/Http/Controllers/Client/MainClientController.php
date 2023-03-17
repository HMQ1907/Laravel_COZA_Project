<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Product;

use Illuminate\Http\Request;

class MainClientController extends Controller
{
    //
    public function index(){
        // $productAll = Product::where('active',1)->get()->paginate(15);
        $productAll = DB::table('products')->where('active',1)->simplePaginate(15);
        $sliderActive = Slider::where('id',4)->get();
        $sliders = Slider::limit(2)->where('active',1)->orderBy('id')->get();
        $categorys = Menu::where('parent_id',0)->get();
        $categorysLimit = Menu::where('parent_id',0)->take(3)->get();
        return view('client.main',compact('categorys','categorysLimit','sliders','sliderActive','productAll'));
    }
}
?>