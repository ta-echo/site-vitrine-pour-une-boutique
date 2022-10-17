<?php

include("../connect.php");

class ArticleImageEntity
{
    public $id;
    public $id_article;
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
            $stmt = $pdo->prepare("INSERT INTO article_image (id_article, type, filename) VALUES (:id_article, :type, :filename)");
            $stmt->bindValue('id_article', $this->id_article, PDO::PARAM_INT);
            $stmt->bindValue('type', $this->type, PDO::PARAM_STR);
            $stmt->bindValue('filename', $this->filename, PDO::PARAM_STR);
            $result = $stmt->execute();

            if ($result) // Si c'est reussi
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt= $pdo->prepare("UPDATE article_image SET id_article=:id_article, type=:type, filename=:filename WHERE id_image=:id_image");            
            $stmt->bindValue('id_article', $this->id_article, PDO::PARAM_INT);
            $stmt->bindValue('type', $this->type, PDO::PARAM_STR);
            $stmt->bindValue('filename', $this->filename, PDO::PARAM_STR);
            $stmt->bindValue('id_image', $this->id, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
         } 
    }

    public function uploadArticleImage($tmp_file)
    {
        move_uploaded_file($tmp_file,"../data/article_images/".$this->filename);
    }


    // delete = static function car il ne peut pas supprimer tout seul comme le verbe transitif
    // static function :: non pas -> , self non pas $this 
    // Exemple: $article::delete(1);
    // Il faut du paramètre ($id)
    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM article_image WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public function loadFromId($id) : ArticleImageEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT id_image,id_article,type,filename FROM article_image WHERE id_image=:id_image");
        $stmt->bindValue('id_image', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_image'];
            $this->id_article = $row['id_article'];
            $this->type = $row['type'];
            $this->filename = $row['filename'];
        }
        else
            throw new Exception("L'identifiant n'existe pas");
        return $this;  
        
    }
}


class ArticleImageEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadArticleImages();
    }

    function getArticleImages() : array
    {
        return $this->items;
    }
    
    function loadArticleImages()
    {
        global $conn;
        $sql = "SELECT * FROM article_image";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $article_image = new ArticleImageEntity();
            $article_image->id = $result["id_image"];
            $article_image->id_article = $result["id_article"];
            $article_image->type = $result["type"];
            $article_image->filename = $result["filename"];
            array_push($this->items, $article_image);
        }
    }
}


?>