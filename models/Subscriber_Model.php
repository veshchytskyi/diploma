<?php
class Subscriber_Model{

    public function SelectList(){
        $st=DataBase::handler()->prepare('SELECT Subscribers.*,Tariffs.tariff_name,Country.country_name FROM Subscribers INNER JOIN Tariffs ON Subscribers.tariff_id=Tariffs.tariff_id
                                                                                                                         INNER JOIN Country ON Subscribers.subscriber_country=Country.country_id');
        $st->execute();
        $result=$st->fetchAll();
        if (!$result) return false;
        else return $result;
    }
    public function Search($params){
        $conditions=array();
        foreach($params as $field=>$value){
            if($value){
                $conditions[]='Subscribers.'.$field."='".$value."'";
            }
        }
        $sql="SELECT Subscribers.*,Tariffs.tariff_name,Country.country_name FROM Subscribers INNER JOIN Tariffs ON Subscribers.tariff_id=Tariffs.tariff_id INNER JOIN Country ON Subscribers.subscriber_country=Country.country_id";
        if (sizeof($conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }
        $st=DataBase::handler()->prepare($sql);
        $st->execute();
        $res=$st->fetchAll();
        if (!$res) return false;
        else return $res;
    }
    public function SelectById($subscriber_id){
        $st=DataBase::handler()->prepare('SELECT Subscribers.*,Tariffs.tariff_name FROM Subscribers INNER JOIN Tariffs ON Subscribers.tariff_id=Tariffs.tariff_id WHERE subscriber_id=:subscriber_id');
        $st->execute(array(
            'subscriber_id'=>$subscriber_id
        ));
        $result=$st->fetch();
        if (!$result) return false;
        return $result;
    }
    public function Insert($phone,$name,$country,$city,$tariff_id){
        $st=DataBase::handler()->prepare("INSERT INTO Subscribers(subscriber_phone,subscriber_name,subscriber_country,subscriber_city,subscriber_balance,tariff_id) VALUES (:subscriber_phone,:subscriber_name,:subscriber_country,:subscriber_city,:subscriber_balance,:tariff_id)");
        $st->execute(array(
            'subscriber_phone'=>$phone,
            'subscriber_name'=>$name,
            'subscriber_country'=>$country,
            'subscriber_city'=>$city,
            'subscriber_balance'=>0,
            'tariff_id'=>$tariff_id

        ));
    }
    public function Update($subscriber_id,$phone,$name,$country,$city,$tariff_id){
        $st=DataBase::handler()->prepare('UPDATE Subscribers SET subscriber_phone=:subscriber_phone,subscriber_name=:subscriber_name,subscriber_country=:subscriber_country,subscriber_city=:subscriber_city,tariff_id=:tariff_id WHERE subscriber_id=:subscriber_id');
        $st->execute(array(
            'subscriber_phone'=>$phone,
            'subscriber_name'=>$name,
            'subscriber_country'=>$country,
            'subscriber_city'=>$city,
            'tariff_id'=>$tariff_id,
            'subscriber_id'=>$subscriber_id,
        ));
    }
    public function Delete($subscriber_id){
        $st=DataBase::handler()->prepare('DELETE FROM Subscribers WHERE subscriber_id=:subscriber_id');
        $st->execute(array(
            'subscriber_id'=>$subscriber_id
        ));
    }
}
