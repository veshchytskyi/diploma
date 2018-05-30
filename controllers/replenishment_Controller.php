<?php
class replenishment_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $replenishment=new Replenishment_Model();
        $data_replenishment=$replenishment->SelectList();
        $subscriber=new Subscriber_Model();
        $data_subscriber=$subscriber->SelectList();
        $path=array('views/admin/replenishment.php');
        $this->view->generateContent($path,array('data_replenishment'=>$data_replenishment,'data_subscriber'=>$data_subscriber));
        $this->view->display();
    }
    public function replenishAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $replenishment=new Replenishment_Model();
        $replenishment->Insert($_POST['subscriber_id'],$_POST['replenishment_sum']);
        header('Location: /replenishment');
    }
}