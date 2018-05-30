<?php
    class main_Controller extends Controller{
        public function indexAction($params=array()){
            header('Location: /main/login/');
            die;
        }
        public function loginAction($params=array()){
            if (Access::checkloginAction()) {
                header('Location: /subscribers');
                die;
            }
            $path=array('login'=>'views/admin/login.php');
            $this->view->generateContent($path);
            $this->view->display();
        }
        public function logoutAction($params=array()){
            Access::logout();
            header('Location: /');
        }

    }
