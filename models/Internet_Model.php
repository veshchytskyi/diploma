<?php
class Internet_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Internet.*,Subscribers.subscriber_phone FROM Internet INNER JOIN Subscribers ON Internet.subscriber_id=Subscribers.subscriber_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($internet_id){
        $st=DataBase::handler()->prepare('SELECT Internet.*,Subscribers.subscriber_phone FROM Internet INNER JOIN Subscribers ON Internet.subscriber_id=Subscribers.subscriber_id WHERE internet_id=:internet_id');
        $st->execute(array(
            'internet_id'=>$internet_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($subscriber_id, $traffic){
        $st=DataBase::handler()->prepare("INSERT INTO Internet(subscriber_id,traffic,use_date) VALUES (:subscriber_id,:traffic,NOW())");
        $st->execute(array(
            'subscriber_id'=>$subscriber_id,
            'traffic'=>$traffic
        ));
    }
}