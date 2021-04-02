<?php 

namespace App\Lib;

use Exception;
use PDO;

class Database{
    private $host;
    private $dbname;
    private $dbuser;
    private $password;
    private $charset;

    public function connect(){
        $this->host = 'localhost';
        $this->dbname = "realestate_db";
        $this->charset = 'utf8mb4';
        $this->dbuser = 'root';
        $this->password = '';

        try{
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . 
                    $this->charset;
            $pdo = new PDO($dsn, $this->dbuser, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(Exception $e){
            echo "Lidhja me databaze deshtoi " . $e->getMessage();
        }
    }

    public function getAll($table){
        $sql = "SELECT * FROM $table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>