<?php

namespace App\Lib;
use App\Lib\Database;
use PDO;

class User extends Database{
    const TABLE = "users";

    public function addUser($fn,$ln,$em,$us,$pw){
        if($fn == "" || $ln == "" || $em == "" || $us == "" || $pw == "" ){
            header("Refresh: 3");
        }else{
            $pw1 = password_hash($pw,PASSWORD_DEFAULT); 
            $sql = "INSERT INTO users (first_name,last_name,email,username,password) VALUES (?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);          
            $stmt->execute(["$fn","$ln","$em","$us","$pw1"]);
            header("Location: login.php");
        }
              
    }

    public function verify_user($username, $password){
        $sql = "SELECT * from users where username =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$username"]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(is_array($row)){
            if(password_verify($password, $row['password'])){
                return $row;
                // header("Location: index.php");
            }else{
                echo "<script>alert('Username ose password nuk jane ne rregull!');</script>";
            }
        }
    }
    public function get_user_by_id($id){
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function modify_user($id, $first_name, $last_name, $email, $username){
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, username = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["$first_name", "$last_name", "$email", "$username", $id]);
        header("Location: profile.php");
    }
}
?>