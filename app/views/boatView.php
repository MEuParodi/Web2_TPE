<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class  boatView {
    private $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty(); 
    }

     function showAll($boats) {
    //    $this->smarty->assign('count', count($boats)); 
        $this->smarty->assign('boats', $boats);
        $this->smarty->display('tables/boats.tpl');
    }

    function showFormAddBoat(){
        $this->smarty->display('forms/addBoat.tpl');
    }

    function showFormEditBoat($boat){
        $this->smarty->assign('boat', $boat);
        $this->smarty->display('forms/editBoat.tpl');
    }

}