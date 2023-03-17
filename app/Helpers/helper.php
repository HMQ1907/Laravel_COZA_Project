<?php
namespace App\Helpers;

class helper{
    public static function menu($menus,$parent_id=0,$char=''){
        $html = '';
        foreach ($menus as $key=>$menu){
         if($menu->parent_id==$parent_id){
            $html.='
            <tr _ngcontent-vtt-c8="">
                <td _ngcontent-vtt-c8=""> '.$menu->id.' </td>
                <td _ngcontent-vtt-c8=""> '.$char.$menu->name.' </td>
                <td _ngcontent-vtt-c8=""> '.$menu->active.' </td>
                <td _ngcontent-vtt-c8=""> '.$menu->updated_at.' </td>
                <td _ngcontent-vtt-c8="" class="text-primary"> 
                <a class="btn btn-info" href=><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-primary" href=""><i class="fa-solid fa-trash"></i></a>
                </td>
        </tr>
        ';
        unset($menus[$key]);
        $html.=self::menu($menus,$menu->id,$char.'---- ');
         }
        }
        return $html;
    }
    public static function menuClient($menus,$parent_id=0){
           $html='';
           foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '
                <li>
                    <a href=""> '.$menu->name.' </a>';
            }
            if (self::isParent($menus,$menu->id)){
                $html .= '<ul class="sub-menu">';
                $html .= self::menuClient($menus,$menu->id);    
                $html .= '</ul>';
            }   
            $html .= '</li>';
             }
    
        return $html;
    }
    public static function isParent($menus,$id){
        foreach($menus as $menu){
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;    
    }
}

?>