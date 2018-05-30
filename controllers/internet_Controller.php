<?php
class internet_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $internet=new Internet_Model();
        $data=$internet->SelectList();
        $path=array('views/admin/internet.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
}