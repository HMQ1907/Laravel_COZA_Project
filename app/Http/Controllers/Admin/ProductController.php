<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = DB::table('products')->join('menus', 'menus.id', '=', 'products.menu_id')
        ->select('products.*','menus.name as menu_name')
        ->get();
        return view('admin.product.list',[
            'title'=>'ListProduct',
            'products'=>$products
        ]);
    }
    public function add(){
        $menus= Menu::all();

        return view('admin.product.add',[
            'title'=>'AddProduct',
            'menus'=>$menus
        ]);
    }
    public function store(Request $request){
        if($request->hasFile('myfile')){
        $file = $request->myfile;
        $file_name = 'assets/'.$file->getClientOriginalName();
        $file->move('assets',$file_name);
        }
        else{
            $file_name = '';
        }
        Product::create([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'content'=>$request->input('content'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'active'=>$request->input('active'),
            'thumb'=>$file_name,
            'menu_id'=>$request->input('menu_id')
        ]);
        return redirect(route('product.list'))->with('success','Thêm dữ liệu thành công');
    }
    public function edit($id){
        $product = Product::find($id);
        $menus= Menu::all();
        return view('admin.product.edit',[
            'title'=>'EditProduct',
            'product'=>$product,
            'menus'=>$menus
        ]);
    }
    public function editStore(Request $request,$id){

        $product = Product::find($id);
        
        if($request->hasFile('myfile')){
        $file = $request->myfile;
        $file_name = 'assets/'.$file->getClientOriginalName();
        $file->move('assets',$file_name);
        }
        else {
            $file_name = $product->thumb;
        }
        $product->update([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'content'=>$request->input('content'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount'),
            'active'=>$request->input('active'),
            'thumb'=>$file_name,
            'menu_id'=>$request->input('menu_id')
        ]);
        return redirect()->route('product.list')->with('success','Update thanh cong');
       
        
    }
    public function destroy($id){
        Product::find($id)->delete();
        session()->flash('success','Đã xóa Sản phẩm');
        return back();
    }
}