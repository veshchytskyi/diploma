<?php
class Call_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Calls.*,Subscribers.subscriber_phone FROM Calls INNER JOIN Subscribers ON Calls.subscriber_id=Subscribers.subscriber_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($call_id){
        $st=DataBase::handler()->prepare('SELECT Calls.*,Subscribers.subscriber_phone FROM Calls INNER JOIN Subscribers ON Calls.subscriber_id=Subscribers.subscriber_id WHERE call_id=:call_id');
        $st->execute(array(
            'call_id'=>$call_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($subscriber_id,$call_phone,$call_start,$call_finish){
        $st=DataBase::handler()->prepare("INSERT INTO Calls(subscriber_id,call_phone,call_start,call_finish) VALUES (:subscriber_id,:call_phone,:call_start,:call_finish)");
        $st->execute(array(
            'subscriber_id'=>$subscriber_id,
            'call_phone'=>$call_phone,
            'call_start'=>$call_start,
            'call_finish'=>$call_finish
        ));
    }
}