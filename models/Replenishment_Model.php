<?php
class Replenishment_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Replenishment.*,Subscribers.subscriber_phone FROM Replenishment INNER JOIN Subscribers ON Replenishment.subscriber_id=Subscribers.subscriber_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($replenishment_id){
        $st=DataBase::handler()->prepare('SELECT Replenishment.*,Subscribers.subscriber_phone FROM Replenishment INNER JOIN Subscribers ON Replenishment.subscriber_id=Subscribers.subscriber_id WHERE replenishment_id=:replenishment_id');
        $st->execute(array(
            'replenishment_id'=>$replenishment_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($subscriber_id,$replenishment_sum){
        $st=DataBase::handler()->prepare("INSERT INTO Replenishment(replenishment_date,subscriber_id,replenishment_sum) VALUES (NOW(),:subscriber_id,:replenishment_sum)");
        $st->execute(array(
            'subscriber_id'=>$subscriber_id,
            'replenishment_sum'=>$replenishment_sum
        ));
    }
}