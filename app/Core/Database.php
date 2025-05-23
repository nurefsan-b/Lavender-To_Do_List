<?php

namespace App\Core;

use PDO;
use PDOException;

class Database{
    private static $instance=null;
    private $connection;
    
    private function __construct(){ 

       $config=require __DIR__.'/../../config.php';
       $db=$config['db'];

       $dsn="mysql:host={$db['host']};
       dbname={$db['dbname']};charset={$db['charset']}";

       try{
        $this->connection= new PDO ($dsn,$db['user'],$db['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       }catch(PDOException $e){
                die("Veritabanı bağlantısı sağlanamadı: " . $e->getMessage());
       }
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->connection;
    }
}     