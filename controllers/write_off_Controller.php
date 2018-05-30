<?php
class write_off_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $write_off=new Write_off_Model();
        $data_write_off=$write_off->SelectList();
        $subscriber=new Subscriber_Model();
        $data_subscriber=$subscriber->SelectList();
        $path=array('views/admin/write_off.php');
        $this->view->generateContent($path,array('data_write_off'=>$data_write_off,'data_subscriber'=>$data_subscriber));
        $this->view->display();
    }
    public function add_write_offAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $write_off=new Write_off_Model();
        $write_off->Insert($_POST['subscriber_id'],$_POST['write_off_sum']);
        header('Location: /write_off');
    }
}