<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function getAll(){
        return Menu::orderby('id')->simplePaginate(15);
    }
    public function show(){
        return Menu::select('name','id')->orderbyDesc('id')->get();
    }
    public function create($request){
        if($request->hasfile('avt_menu')){
            $file = $request->file('avt_menu');
            $file_name = 'assets/Avt_menu/'.$file->getClientOriginalName();
            $file -> move('assets/Avt_Menu',$file_name);
        }else{
            $file_name = '';
        }
        try{
            Menu::create([
                'name'=>$request->input('name'),
                'parent_id'=>$request->input('parent_id'),
                'description'=>$request->input('description'),
                'content'=>$request->input('content'),
                'active'=>$request->input('active'),
                'avt_menu'=>$file_name                
            ]);
            session()->flash('notification','Tạo danh mục thành công');
        }
        catch(\Exception $err){
            
            session()->flash('notification', $err->getMessage());
            return false;
        }
        return true;
    }
}

?>