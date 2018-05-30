<?php
class statistics_controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $call=new Subscriber_Model();
        $test=new Replenishment_Model();
        $data=$call->SelectList();
        $testdata=$test->SelectList();
        $path=array('views/admin/statistics.php');
        $this->view->generateContent($path,array('data_subscriber'=>$data,'data_rep'=>$testdata));
        $this->view->display();
    }
}
