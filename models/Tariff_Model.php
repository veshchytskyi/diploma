<?php
class Tariff_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT * FROM Tariffs');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function SelectById($tariff_id){
        $st=DataBase::handler()->prepare('SELECT * FROM Tariffs WHERE tariff_id=:tariff_id');
        $st->execute(array(
            'tariff_id'=>$tariff_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($tariff_name,$call_price,$sms_price,$internet_price){
        $st=DataBase::handler()->prepare("INSERT INTO Tariffs(tariff_name,call_price,sms_price,internet_price) VALUES (:tariff_name,:call_price,:sms_price,:internet_price)");
        $st->execute(array(
            'tariff_name'=>$tariff_name,
            'call_price'=>$call_price,
            'sms_price'=>$sms_price,
            'internet_price'=>$internet_price
        ));
    }
    public function Update($tariff_id,$tariff_name,$call_price,$sms_price,$internet_price){
        $st=DataBase::handler()->prepare('UPDATE Tariffs SET tariff_name=:tariff_name,call_price=:call_price,sms_price=:sms_price,internet_price=:internet_price WHERE tariff_id=:tariff_id');
        $st->execute(array(
            'tariff_name'=>$tariff_name,
            'call_price'=>$call_price,
            'sms_price'=>$sms_price,
            'internet_price'=>$internet_price,
            'tariff_id'=>$tariff_id
        ));
    }
    public function Delete($tariff_id){
        $st=DataBase::handler()->prepare('DELETE FROM Tariffs WHERE tariff_id=:tariff_id');
        $st->execute(array(
            'tariff_id'=>$tariff_id
        ));
    }
}