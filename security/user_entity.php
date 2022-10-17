<?php

include("../connect.php");

class UserEntity
{
    public $id;
    public $login;
    public $avatar;
    public $password;

    public function __construct()
    {

    }

    public function save() : bool
    {
        global $pdo;
         if ($this->id === null)
         {
            $stmt = $pdo->prepare("INSERT INTO user (username, password, filename) VALUES (:username,:password,:filename)");
            $result = $stmt->execute(['username'=>$this->login, 'password'=>$this->password, 'filename'=>$this->avatar]);

            if ($result)
            {
                $this->id = $pdo->lastInsertId();
            }
            return $this->id != null;
         }
         else
         {
            $stmt = $pdo->prepare("UPDATE user SET username=:username, password=:password, filename=:filename WHERE id_user=:id_user");
            $stmt->bindValue('id_user', $this->id, PDO::PARAM_INT);
            $stmt->bindValue('username', $this->login, PDO::PARAM_STR);
            $stmt->bindValue('password', $this->password, PDO::PARAM_STR);
            $stmt->bindValue('filename', $this->avatar, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
         } 
    }

    public function uploadAvatar($tmp_file)
    {
        move_uploaded_file($tmp_file,"../data/user_images/".$this->avatar);
    }

    public static function delete($id) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM user WHERE id_user=:id_user");
        $stmt->bindValue('id_user', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    public function changePassword($newPassword) : bool
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE user SET password=:password WHERE id_user=:id_user");
        $stmt->bindValue('id_user', $this->id, PDO::PARAM_INT);
        $stmt->bindValue('password', $newPassword, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result)
            $this->password = $newPassword;
        return $result;
    }

    public function loadFromId($id) : UserEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM user WHERE id_user=:id_user");
        $stmt->bindValue('id_user', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_user'];
            $this->login = $row['username'];
            $this->avatar = $row['filename'];
            $this->password = $row['password'];
        }
        else
            throw new Exception("L'utilisateur n'existe pas");
        return $this;  
        
    }


    public function loadFromLogin($username) : UserEntity
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username=:username");
        $result = $stmt->execute(['username'=>$username]);

        if ($result && $stmt->rowCount() > 0)
        {
            $row = $stmt->fetch();
            $this->id = $row['id_user'];
            $this->login = $row['username'];
            $this->avatar = $row['filename'];
            $this->password = $row['password'];
        }
        else
            throw new Exception("L'utilisateur n'existe pas");
        return $this;  
    }

   
}


class UserEntityList
{
    private $items = [];

    function __construct($loadAll)
    {
        if ($loadAll) 
            $this->loadUsers();
    }

    function getUsers() : array
    {
        return $this->items;
    }
    
    function loadUsers()
    {
        global $conn;
        $sql = "SELECT * FROM user";
        $results = mysqli_query($conn, $sql) ;//or die("Connection to DB or query failed");

        while($result=mysqli_fetch_array($results))
        {
            $user = new UserEntity();
            $user->id = $result["id_user"];
            $user->login = $result["username"];
            $user->password = $result["password"];
            $user->avatar = $result["filename"];
            array_push($this->items, $user);
        }
    }
}


?>