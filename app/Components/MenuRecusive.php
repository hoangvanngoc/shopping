<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{

    private $html;
    public function __construct()
    {
        $this->html='';
    }

    public function menuRecusiveAdd($parentIdMenuEdit,$parentID = 0, $subMark = ''){
        $data = Menu::where('parent_id', $parentID)->get();
        foreach ($data as $dataItem){
            if($parentIdMenuEdit==$dataItem->id){
                $this->html .= '<option selected value="'.$dataItem->id.'">'.$subMark .$dataItem->name.'</option>';
            }else{
                $this->html .= '<option value="'.$dataItem->id.'">'.$subMark .$dataItem->name.'</option>';
            }


            $this->menuRecusiveAdd($parentIdMenuEdit,$dataItem->id, $subMark.'--');
        }
        return $this->html;
    }

}
?>
