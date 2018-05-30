<?php
class Access{
    static function checkloginAction(){
        if (Session::get('admin')) {
            return true;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $st=DataBase::handler()->prepare("SELECT Users_db.*,Users_db_types.user_db_type_name FROM Users_db INNER JOIN Users_db_types ON Users_db.user_db_type_id=Users_db_types.user_db_type_id WHERE Users_db.user_db_login=:user_login");
            $st->execute(array(
                'user_login'=>$_POST['admin_login']
            ));
            $result=$st->fetch();
            if ($_POST['admin_login'] === $result['user_db_login'] and $_POST['admin_password'] === $result['user_db_password']) {
                Session::set('admin', $result['user_db_type_name']);
                return true;
            }
        }
        return false;
    }
    static function logout(){
        Session::destroy('admin');
    }
}