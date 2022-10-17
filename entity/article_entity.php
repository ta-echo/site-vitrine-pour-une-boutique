<?php

include("../connect.php");

class ArticleEntity
{
    public $id;
    public $titre;
    public $text;
    public $category;
    public $date;

    public function __construct()
    {

    }

    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)
         {
            $stmt = $pdo->prepare("INSERT INTO article (titre, text, category, date) VALUES (:titre, :text, :category, :date)");
            $result = $stmt->execute(['titre' => $this->titre, 'text'=>$this->text, 'category'=>$this->category, 'date'=>$this->date]);

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt= $pdo->prepare("UPDATE article SET titre=:titre, text=:text, category=:category, date=:date WHERE id_article=:id_article");            
            $stmt->bindValue('id_article', $this->id, PDO::PARAM_INT);
            $stmt->bindValue('titre', $this->titre, PDO::PARAM_STR);
            $stmt->bindValue('text', $this->text, PDO::PARAM_STR);
            $stmt->bindValue('category', $this->category, PDO::PARAM_STR);
            $stmt->bindValue('date', $this->date, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
         } 
    }

    // delete = static function car il ne peut pas supprimer tout seul comme le verbe transitif
    // static function :: non pas -> , self non pas $this 
    // Il faut du paramètre ($id)
    // Exemple: $article::delete(1);
    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM article WHERE id_article=:id_article");
        $stmt->bindValue('id_article', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public function loadFromId($id) : ArticleEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article=:id_article");
        $stmt->bindValue('id_article', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_article'];
            $this->titre = $row['titre'];
            $this->text = $row['text'];
            $this->category = $row['category'];
            $this->date = $row['date'];
        }
        else
            throw new Exception("L'article n'existe pas");
        return $this;  
        
    }
}


class ArticleEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadArticles();
    }

    function getArticles() : array
    {
        return $this->items;
    }
    
    function loadArticles()
    {
        global $conn;
        $sql = "SELECT * FROM article";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $article = new ArticleEntity();
            $article->id = $result["id_article"];
            $article->titre = $result["titre"];
            $article->text = $result["text"];
            $article->category = $result["category"];
            $article->date = $result["date"];
            array_push($this->items, $article);
        }
    }
}


?>