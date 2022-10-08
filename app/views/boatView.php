<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class  boatView {
    private $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    public function showAll($boats, $warning = null , $boat_id = null) {
    //    $this->smarty->assign('count', count($boats)); 
        $this->smarty->assign('boats', $boats);
        $this->smarty->assign('warning', $warning);
        $this->smarty->assign('boat_to_delete', $boat_id);
        $this->smarty->display('tables/boats.tpl');
    }

    public function showFormAddBoat(){
        $this->smarty->display('forms/addBoat.tpl');
    }

    public function showFormEditBoat($boat){
        $this->smarty->assign('boat', $boat);
        $this->smarty->display('forms/editBoat.tpl');
    }

}