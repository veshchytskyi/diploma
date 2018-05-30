<?php
class Write_off_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Write_off.*,Subscribers.subscriber_phone FROM Write_off INNER JOIN Subscribers ON Write_off.subscriber_id=Subscribers.subscriber_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($write_off_id){
        $st=DataBase::handler()->prepare('SELECT Write_off.*,Subscribers.subscriber_phone FROM Write_off INNER JOIN Subscribers ON Write_off.subscriber_id=Subscribers.subscriber_id WHERE write_off_id=:write_off_id');
        $st->execute(array(
            'write_off_id'=>$write_off_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($subscriber_id,$write_off_sum){
        $st=DataBase::handler()->prepare("INSERT INTO Write_off(write_off_date,subscriber_id,write_off_sum) VALUES (NOW(),:subscriber_id,:write_off_sum)");
        $st->execute(array(
            'subscriber_id'=>$subscriber_id,
            'write_off_sum'=>$write_off_sum
        ));
    }
}