<?php

include("../connect.php");

class PageEntity
{
    /*
    private $id;
    private $titre;
    private $text;
    private $category;
    private $date;
*/

    public $id;
    public $titre;
    public $text;
    public $category;
    public $date;

/*
    public function __construct($id, $titre, $text, $category, $date)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->text = $text;
        $this->category = $category;
        $this->date = $date;

    }
*/


    public function __construct()
    {

    }


    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)
         {
            $stmt = $pdo->prepare("INSERT INTO page (titre, text, category, date) VALUES (:titre, :text, :category, :date)");
            $result = $stmt->execute(['titre'=>$this->titre, 'text'=>$this->text, 'category'=>$this->category, 'date'=>$this->date]);

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt = $pdo->prepare("UPDATE page SET titre='$this->titre', text='$this->text', category='$this->category', date='$this->date' WHERE id_page=:id_page");            
            $stmt->bindValue('id_page', $this->id, PDO::PARAM_INT);
            $stmt->bindValue('titre', $this->titre, PDO::PARAM_STR);
            $stmt->bindValue('text', $this->text, PDO::PARAM_STR);
            $stmt->bindValue('category', $this->category, PDO::PARAM_STR);
            $stmt->bindValue('date', $this->date, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
         } 
    }

    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM page WHERE id_page=:id_page");
        $stmt->bindValue('id_page', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    /* ?????????????????????????????? only titre.. How can I add another .. text, category, date => WHERE id_article='$id'*/
    /*
    public function changeArticle($titre, $text, $category, $date)
    {
        global $pdo;
        /* ?????????????????? seulement titre...*/
      /*  $pdo->query("UPDATE article SET titre='$titre, text='$text', category='$category', date='$date' WHERE id_article='$this->id'");
        $this->titre = $titre;
    }*/

    

    /*
    public function changeArticle($newArticle)
    {
        global $pdo;
        /* ?????????????????? seulement titre...*/
        /*$pdo->query("UPDATE article SET titre='$newArticle' WHERE id_article='$this->id'");
        $this->titre = $newArticle;
    }
    */

    public function loadFromId($id) : PageEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM page WHERE id_page=:id_page");
        $stmt->bindValue('id_page', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_page'];
            $this->titre = $row['titre'];
            $this->text = $row['text'];
            $this->category = $row['category'];
            $this->date = $row['date'];
        }
        else
            throw new Exception("Le page n'existe pas");
        return $this;  
        
    }
}


class PageEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadPages();
    }

    function getPages() : array
    {
        return $this->items;
    }
    
    function loadPages()
    {
        global $conn;
        $sql = "SELECT * FROM page";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $page = new PageEntity();
            $page->id = $result["id_page"];
            $page->titre = $result["titre"];
            $page->text = $result["text"];
            $page->category = $result["category"];
            $page->date = $result["date"];
            array_push($this->items, $page);
        }
    }
}


?>