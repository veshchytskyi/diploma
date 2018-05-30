<?php
class Message_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Messages.*,Subscribers.subscriber_phone FROM Messages INNER JOIN Subscribers ON Messages.subscriber_id=Subscribers.subscriber_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($message_id){
        $st=DataBase::handler()->prepare('SELECT Messages.*,Subscribers.subscriber_phone FROM Messages INNER JOIN Subscribers ON Messages.subscriber_id=Subscribers.subscriber_id WHERE message_id=:message_id');
        $st->execute(array(
            'message_id'=>$message_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($subscriber_id, $message_phone){
        $st=DataBase::handler()->prepare("INSERT INTO Messages(subscriber_id,message_phone,message_date) VALUES (:subscriber_id,:message_phone,NOW())");
        $st->execute(array(
            'subscriber_id'=>$subscriber_id,
            'message_phone'=>$message_phone
        ));
    }
}