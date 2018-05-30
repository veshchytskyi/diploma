<?php
class client_Controller extends Controller{
    public function __construct()
    {
        parent::__construct();
        $this->view->setTemplate('views/client/main_template.php');
    }

    public function indexAction($param=array()){
        $subscriber=new Subscriber_Model();
        $data=$subscriber->SelectList();
        $path=array('views/client/content.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
    public function callAction($param=array()){
        $call=new Call_Model();
        $call->Insert($_POST['subscriber_id'], $_POST['call_phone'],$_POST['call_start'] ,$_POST['call_finish'] );
        header("Location: /client");
    }
    public function messageAction($param=array()){
        $message=new Message_Model();
        $message->Insert($_POST['subscriber_id'], $_POST['message_phone']);
        header("Location: /client");
    }
    public function internetAction($param=array()){
        $internet=new Internet_Model();
        $internet->Insert($_POST['subscriber_id'], $_POST['traffic']);
        header("Location: /client");
    }
}