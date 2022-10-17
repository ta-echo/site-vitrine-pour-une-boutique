<?php

include("../connect.php");

class AnnonceEntity
{
    public $id;
    public $annonce;
    //public $avatar;
    //public $password;

    public function __construct()
    {

    }

    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)
         {  // VALUES (:annonce) > VALUES (:annoncement) ?????????????????? l.22
            $stmt = $pdo->prepare("INSERT INTO header_bar (announcement) VALUES (:announcement)");
            $result = $stmt->execute(['announcement' => $this->annonce]);

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt= $pdo->prepare("UPDATE header_bar SET announcement=:announcement WHERE id_header_bar=:id_header_bar");            
            $result = $stmt->execute(['announcement' => $this->annonce, 'id_header_bar'=>$this->id]);
            return $result;
         } 
    }

    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM header_bar WHERE id_header_bar=:id_header_bar");
        $stmt->bindValue('id_header_bar', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }


    public function changeAnnonce($newAnnonce)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE header_bar SET announcement =:announcement WHERE id_header_bar=:id_header_bar");
        $stmt->bindValue('id_header_bar', $this->id, PDO::PARAM_INT);
        $stmt->bindValue('announcement', $newAnnonce, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }



    public function loadFromId($id) : AnnonceEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM header_bar WHERE id_header_bar=:id_header_bar");
        $stmt->bindValue('id_header_bar', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_header_bar'];
            $this->annonce = $row['announcement'];
            //$this->avatar = $row['filename'];
            //$this->password = $row['password'];
        }
        else
            throw new Exception("L'identifiant n'existe pas"); //0 = throw = exception
        return $this;  
        
    }
}


class AnnonceEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadAnnonces();
    }

    function getAnnonces() : array
    {
        return $this->items;
    }
    
    function loadAnnonces()
    {
        global $conn;
        $sql = "SELECT * FROM header_bar";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $annoncement = new AnnonceEntity();
            $annoncement->id = $result["id_header_bar"];
            $annoncement->annonce = $result["announcement"];
            array_push($this->items, $annoncement);
        }
    }
}


?>