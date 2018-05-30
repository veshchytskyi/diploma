<?php
class calls_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $call=new Call_Model();
        $data=$call->SelectList();
        $path=array('views/admin/calls.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
}
