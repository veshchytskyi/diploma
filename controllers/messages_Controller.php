<?php
class messages_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $message=new Message_Model();
        $data=$message->SelectList();
        $path=array('views/admin/messages.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
}