<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this -> menuService = $menuService;
        
    }
    function create(){
        return view('admin.menu.add',[
            'title'=>'Create New',
            'menus'=>$this->menuService->getParent()
        ]);
    }
    function store(CreateFormRequest $request){
        $result = $this->menuService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.menu.list',[
            'title'=>'Danh Sach danh muc',
            'menus'=>$this->menuService->getAll()
        ]);
    }
    public function destroy($id){
        Menu::find($id)->delete();
        session()->flash('notifi','Đã xóa danh mục');
        return back();
    }
    public function edit($id){
        $menuEdit = Menu::find($id);
        return view('admin.menu.edit',[
            'menuEdit'=>$menuEdit,
            'menus'=>$this->menuService->getParent(),
            'title'=>'Cập nhật'
        ]);   
    }
    public function editStore(Request $request,$id){    
        $menuEdit = Menu::find($id);
        if($request->hasFile('avt_menu')){
            $file = $request->file('avt_menu');
            $file_name = 'assets/Avt_menu/'.$file->getClientOriginalName();
            $file -> move('assets/Avt_menu',$file_name);
        }else{
            $file_name= '';
        }
        
        $menuEdit->update([
            'name'=>$request->input('name'),
            'parent_id'=>$request->input('parent_id'),
            'description'=>$request->input('description'),
            'content'=>$request->input('content'),
            'active'=>$request->input('active')? 1 :0,
            'avt_menu'=>$file_name      
        ]);
        return redirect()->route('menu.list')->with('success','Update thanh cong');
    }
}