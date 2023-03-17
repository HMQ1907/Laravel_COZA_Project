<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function add(){
        return view('admin.slider.add',[
            'title'=>'Add new slide'
        ]);
    }
    public function store(Request $request){
        if($request->hasFile('myfile'))
        $file = $request->myfile;
        $file_name = 'assets/slide/'.$file->getClientOriginalName();
        $file->move('assets/slide',$file_name);
        Slider::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'sort_by'=>$request->input('sort_by'),
            'active'=>$request->input('active'),
            'thumb'=>$file_name
        ]);
        return redirect()->route('slider.list')->with('success','Thêm slide thành công');
    }
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.list',[
            'title'=>'Danh sách slide',
            'sliders'=>$sliders
        ]);
    }
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',[
            'title'=>'Update Slide',
            'slider'=>$slider
        ]);
    }
    public function editStore(Request $request,$id){
        $slider = Slider::find($id);
        
        if($request->hasFile('myfile')){
        $file = $request->file('myfile');
        $file_name = 'assets/slide/'.$file->getClientOriginalName();
        $file->move('assets/slide',$file_name);
        }
        else {
            $file_name = $slider->thumb;
        }
        $slider->update([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'sort_by'=>$request->input('sort_by'),
            'active'=>$request->input('active'),
            'thumb'=>$file_name
        ]);
        return redirect()->route('slider.list')->with('success','Update thanh cong');
    }
    public function destroy($id){
        Slider::find($id)->delete();
        session()->flash('success','Đã xóa Slide');
        return back();
    }
}   