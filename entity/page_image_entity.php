<?php

include("../connect.php");

class PageImageEntity
{
    public $id;
    public $id_page;
    public $type;
    public $filename;

    public function __construct()
    {

    }

    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)

         {  
            $stmt = $pdo->prepare("INSERT INTO page_image (id_page, type, filename) VALUES (:id_page, :type, :filename)");
            $stmt->bindValue('id_page', $this->id_page, PDO::PARAM_INT);
            $stmt->bindValue('type', $this->type, PDO::PARAM_STR);
            $stmt->bindValue('filename', $this->filename, PDO::PARAM_STR);
            $result = $stmt->execute();

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt= $pdo->prepare("UPDATE page_image SET id_page=:id_page, type=:type, filename=:filename WHERE id_image=:id_image");            
            $stmt->bindValue('id_page', $this->id_page, PDO::PARAM_INT);
            $stmt->bindValue('id_image', $this->id, PDO::PARAM_INT);
            $stmt->bindValue('type', $this->type, PDO::PARAM_STR);
            $stmt->bindValue('filename', $this->filename, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
         } 
    }

    public function uploadPageImage($tmp_file)
    {
        move_uploaded_file($tmp_file,"../data/page_images/".$this->filename);
    }

    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM page_image WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public function loadFromId($id) : PageImageEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM page_image WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_image'];
            $this->id_page = $row['id_page'];
            $this->type = $row['type'];
            $this->filename = $row['filename'];
        }
        else
            throw new Exception("L'identifiant n'existe pas");
        return $this;  
        
    }
}


class PageImageEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadPageImages();
    }

    function getPageImages() : array
    {
        return $this->items;
    }
    
    function loadPageImages()
    {
        global $conn;
        $sql = "SELECT * FROM page_image";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $page_image = new PageImageEntity();
            $page_image ->id = $result["id_image"];
            $page_image ->id_article = $result["id_page"];
            $page_image ->type = $result["type"];
            $page_image ->filename = $result["filename"];
            array_push($this->items, $page_image);
        }
    }
}


?>