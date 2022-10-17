<?php

include("../connect.php");

class GalerieImageEntity
{
    public $id;
    public $id_image;
    public $type;
    public $caption;
    public $filename;

    public function __construct()
    {

    }

    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)

         {  
            $stmt = $pdo->prepare("INSERT INTO galerie (filename, caption, type) VALUES (:filename, :caption, :type)");
            $result =  $stmt->execute(['filename'=>$this->filename, 'caption'=>$this->caption, 'type'=>$this->type ]);

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt= $pdo->prepare("UPDATE galerie SET filename=:filename, type=:type, caption=:caption WHERE id_image=:id_image");            
            $stmt->bindValue('id_image', $this->id, PDO::PARAM_INT);
            $stmt->bindValue('filename', $this->filename, PDO::PARAM_STR);
            $stmt->bindValue('type', $this->type, PDO::PARAM_STR);
            $stmt->bindValue('caption', $this->caption, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
         } 
    }

    public function uploadGalerieImage($tmp_file)
    {
        move_uploaded_file($tmp_file,"../data/galerie_images/".$this->filename);
    }

    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM galerie WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }


    public function loadFromId($id) : GalerieImageEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM galerie WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_image'];
            $this->caption = $row['caption'];
            $this->filename = $row['filename'];
            $this->type = $row['type'];
           
        }
        else
            throw new Exception("L'identifiant n'existe pas");
        return $this;  
        
    }
}


class GalerieImageEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadGalerieImages();
    }

    function getGalerieImages() : array
    {
        return $this->items;
    }
    
    function loadGalerieImages()
    {
        global $conn;
        $sql = "SELECT * FROM galerie";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $galerie_image = new GalerieImageEntity();
            $galerie_image ->id = $result["id_image"];
            $galerie_image ->caption = $result["caption"];
            $galerie_image ->filename = $result["filename"];
            $galerie_image ->type = $result["type"];
            array_push($this->items, $galerie_image);
        }
    }
}


?>