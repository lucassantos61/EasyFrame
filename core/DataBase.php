<?php

namespace Core;

use PDO;
use PDOException;
class DataBase
{
    public function getDataBase()
    {
        $conf = include_once(__DIR__.'/../app/databse.php');

        if($conf['driver'] == 'sqlite'){
            $sqlite = __DIR__.'/../storage/database/'.$conf['sqlite']['host'];
            $sqlite = 'sqlite:' . $sqlite;
            try {
                $pdo = new PDO('sqlite:');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FECTH_MODE,PDO::ATTR_FECTH_OBJ);
                return $pdo;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        $host = $conf['mysql']['host'];
        $database = $conf['mysql']['database'];
        $user = $conf['mysql']['user'];
        $password = $conf['mysql']['password'];
        $charset = $conf['mysql']['charset'];
        $collation = $conf['mysql']['collation'];
        
        try{
            $pdo = new PDO('mysql:host=$host;dbname=$database;charset=$charset',$user,$password);
            $pdo->setAttibute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttibute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES '$charset' COLLATE '$collation'");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FECTH_MODE,PDO::ATTR_FECTH_OBJ);
            return $pdo;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}