<?php
class tariffs_Controller extends Controller{
    public function indexAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $tariff=new Tariff_Model();
        $data=$tariff->SelectList();
        $path=array('views/admin/tariffs.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
    public function add_tariffAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $tariff=new Tariff_Model();
        $tariff->Insert($_POST['tariff_name'],$_POST['call_price'],$_POST['sms_price'],$_POST['internet_price']);
        header('Location: /tariffs');
    }
    public function delete_tariffAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $tariff_id=$params[0];
        $tariff=new Tariff_Model();
        $tariff->Delete($tariff_id);
        header('Location: /tariffs');
    }
    public function edit_formAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $tariff_id=$params[0];
        $tariff=new Tariff_Model();
        $data=$tariff->SelectById($tariff_id);
        $path=array('views/admin/edit_tariff.php');
        $this->view->generateContent($path,$data);
        $this->view->display();
    }
    public function edit_tariffAction($params=array()){
        if(!$this->isAccess){
            header('Location: /main/login/');
            die;
        }
        $tariff_id=$params[0];
        $tariff=new Tariff_Model();
        $tariff->Update($tariff_id,$_POST['tariff_name'],$_POST['call_price'],$_POST['sms_price'],$_POST['internet_price']);
        header('Location: /tariffs');
    }
}