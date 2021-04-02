<?php 

namespace App\Lib;

use Exception;

class Property extends Database{
    
    const TABLE = "properties";

    public function getNumberOfProperties(){
        $sql = "SELECT COUNT(*) as count FROM properties";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getNumberOfPropertiesSale(){
        $sql = "SELECT COUNT(*) as countSale FROM properties WHERE category = 'Sale'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getNumberOfPropertiesRent(){
        $sql = "SELECT COUNT(*) as countRent FROM properties WHERE category = 'Rent'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getPronat(){
        $sql = "SELECT *  FROM properties order by created_at DESC limit 4";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addProperty($user_id,$title,$description,$category,$rooms,$bathrooms,$price, $created_at){
        try{        
            $sql = "INSERT INTO properties(user_id, title, description, category, rooms, bathrooms, price, created_at) VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        
        if($stmt->execute([$user_id,"$title", "$description", "$category", $rooms, $bathrooms, $price, "$created_at"]))   {
            echo "<script> window.alert('u kry') </script>";
        } 
    }catch(Exception $e){
        echo $e->getMessage();
    }
    }

    public function getLastProperty(){
        $sql = "SELECT * from properties order by id desc limit 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserProperty($userid){
        $sql = "SELECT * FROM properties WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userid]);
        return $stmt->fetchAll();      

    }

    public function getPropertyById($propertyid){
        $sql = "SELECT p.*,u.first_name, u.last_name, u.email FROM properties p INNER JOIN users u ON p.user_id = u.id WHERE p.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$propertyid]);
        return $stmt->fetch();
    }



}

?>