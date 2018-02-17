<?php

class DB{

    public $dbCon;
    protected $dataBase;
    // подключение к базе дынных
    public function __construct($username='root', $password='', $host='localhost', $dbname='testDB', $options=[]){
        $this->dbCon = true;
        try{
            $this->dataBase = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password,$options);
            $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dataBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    // разъединение с базой дынных
    public function Dicsonect(){
        $this->dataBase = null;
        $this->dbCon = false;
    }
    // получение одной записи
    public function getRow($query, $params=[]){
        try{
            $stmt = $this->dataBase->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }
        catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    // получение нескольких записей
    public function getRows($query, $params=[]){
        try{
            $stmt = $this->dataBase->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchALL();
        }
        catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    // новая запись в базу дынных
    public function insertRow($query, $params=[]){
        try{
            $stmt = $this->dataBase->prepare($query);
            $stmt->execute($params);
            return true;
        }
        catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    // обновление записи в базе дынных используем метод записи так как он идентичен
    public function updateRow($query, $params=[]){
        $this->insertRow($query, $params);
    }
    // удаление записи в базе дынных используем метод записи так как он идентичен
    public function deleteRow($query, $params=[]){
        $this->insertRow($query, $params);
    }
}
