<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class  expView {
    private $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty(); 
    }

  
    function showAll($exps) {
        $this->smarty->assign('exps', $exps);
        $this->smarty->display('tables/experiences.tpl');
    }

    //muestra todos los detalles en una tarjeta
    function showById($exp, $boat) {
        $this->smarty->assign('place', $exp->place);
        $this->smarty->assign('days', $exp->days);
        $this->smarty->assign('price', $exp->price);
        $this->smarty->assign('description', $exp->description);
        $this->smarty->assign('name', $boat->name);
        $this->smarty->assign('capacity', $boat->capacity);
        $this->smarty->assign('model', $boat->model);
        $this->smarty->assign('image', $boat->image);
        $this->smarty->display('tables/oneExp.tpl');
    }

    function showFilterByBoat($boats){
        $this->smarty->assign('boats', $boats);
        $this->smarty->display('tables/filterByBoat.tpl');
    }


    function showFormAdd($boats){
        //solo puede agergar boats que ya existan pasar datos para un select
        $this->smarty->assign('boats', $boats);
        $this->smarty->display('forms/addExp.tpl');
    }

     function showFormEdit($exp, $boats){
        $this->smarty->assign('exp', $exp);
        $this->smarty->assign('boats', $boats);
        $this->smarty->display('forms/editExp.tpl');
    }
}