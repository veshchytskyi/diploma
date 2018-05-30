<?php

class Controller{
    public $view;
    protected $isAccess=false;
    
    function __construct()
    {
        $this->view=new View();
        $this->view->setTemplate('views/admin/main_template.php',array('user_type'=>Session::get('admin')));
        if (Access::checkloginAction()) {
            $this->isAccess=true;
        }
    }
    
}