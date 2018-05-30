<?php
class subscribers_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $subscriber=new Subscriber_Model();
        $data_subscriber=$subscriber->SelectList();
        $tariff=new Tariff_Model();
        $data_tariff=$tariff->SelectList();
        $country=new Country_Model();
        $data_country=$country->SelectList();
        $path=array('views/admin/subscribers.php');
        $this->view->generateContent($path,array('data_subscriber'=>$data_subscriber,'data_tariff'=>$data_tariff,'data_country'=>$data_country));
        $this->view->display();
    }
    public function add_subscriberAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $subscriber=new Subscriber_Model();
        $subscriber->Insert($_POST['subscriber_phone'],$_POST['subscriber_name'],$_POST['subscriber_country'],$_POST['subscriber_city'],$_POST['tariff_id'],$_POST['country_id']);
        header('Location: /subscribers');
    }
    public function delete_subscriberAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $subscriber_id=$params[0];
        $subscriber=new Subscriber_Model();
        $subscriber->Delete($subscriber_id);
        header('Location: /subscribers');
    }
    public function edit_formAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $subscriber_id=$params[0];
        $subscriber=new Subscriber_Model();
        $data_subscriber=$subscriber->SelectById($subscriber_id);
        $tariff=new Tariff_Model();
        $data_tariff=$tariff->SelectList();
        $path=array('views/admin/edit_subscriber.php');
        $this->view->generateContent($path,array('data_subscriber'=>$data_subscriber,'data_tariff'=>$data_tariff));
        $this->view->display();
    }
    public function edit_subscriberAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $subscriber_id=$params[0];
        $subscriber=new Subscriber_Model();
        $subscriber->Update($subscriber_id,$_POST['subscriber_phone'],$_POST['subscriber_name'],$_POST['subscriber_country'],$_POST['subscriber_city'],$_POST['tariff_id']);
        header('Location: /subscribers');
    }
    public function searchAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $path=array('views/admin/search_subscribers.php');
        $tariff=new Tariff_Model();
        $data_tariff=$tariff->SelectList();
        $country=new Country_Model();
        $data_country=$country->SelectList();
        if(isset($_GET['search'])){
            $subscriber=new Subscriber_Model();
            $data_subscriber=$subscriber->Search(array('subscriber_phone'=>$_GET['subscriber_phone'],'subscriber_name'=>$_GET['subscriber_name'],'subscriber_country'=>$_GET['subscriber_country'],'subscriber_city'=>$_GET['subscriber_city'],'subscriber_balance'=>$_GET['subscriber_balance'],'tariff_id'=>$_GET['tariff_id'],));
            $this->view->generateContent($path,array('data_subscriber'=>$data_subscriber,'data_tariff'=>$data_tariff, 'data_country'=>$data_country));
        }
        else{
            $this->view->generateContent($path,array('data_tariff'=>$data_tariff, 'data_country'=>$data_country));
        }
        $this->view->display();
    }
}
