<?php
class Country_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT * FROM Country WHERE 1');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    // public function SelectById($call_id){
    //     $st=DataBase::handler()->prepare('SELECT Calls.*,Subscribers.subscriber_phone FROM Calls INNER JOIN Subscribers ON Calls.subscriber_id=Subscribers.subscriber_id WHERE call_id=:call_id');
    //     $st->execute(array(
    //         'call_id'=>$call_id
    //     ));
    //     $result=$st->fetch();
    //     if (!$result) return false;
    //     return $result;
    // }
}
