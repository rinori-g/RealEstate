<?php 
namespace App\Lib;
use PDO;
class Image extends Database{

    public function addImages($property_id,$image){
        $sql = "INSERT INTO images(property_id,image)";
        $sql.="VALUES(?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$property_id,"$image"]);
        header("Location: index.php");
    }

    public function getImageByPropertyId($property_id){
        $sql = "SELECT * FROM images WHERE property_id = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$property_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getImageByPropertyIdAll($property_id){
        $sql = "SELECT * FROM images WHERE property_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$property_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}

?>