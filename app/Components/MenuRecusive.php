<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{

    private $html;
    public function __construct()
    {
        $this->html='';
    }
    public function menuRecusiveAdd($parentID, $subMark = ''){
        $date = Menu::where('parent_id', $parentID)->get();
        foreach ($data as $dataItem){
            $this->html .= "<option value".$dataItem->id.">". $subMark .$dataItem->name."</option>";

            $this->menuRecusiveAdd($dataItem->id, $subMark.'--');
        }
        return $this->html;
    }

}
?>
