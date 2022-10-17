<?php

include("user_entity.php");

class UserSession
{
    public $user;
    public $language;

    public function getUser()
    {
        return $this->user;
    }

    private function __construct($user)
    {
        $this->user = $user;
    }

    public static function getCurrentSession() : UserSession
    {   // On ouvre la session
        session_start();
        global $_SESSION;
        $session = new UserSession(null);
        if (isset($_SESSION["user"]))
            // On enregistre le user en session
            $session =  new UserSession($_SESSION["user"]);

        return $session;
    }

    public static function connect($login, $md5) : UserSession
    {
        $user = new UserEntity();
        // try : Traitement
        try {
            $user->loadFromLogin($login);
            if ($md5 != $user->password)
            // throw : Lorsqu'une exception se produit, lancez une exception.
            throw new Exception("Identifiant ou mot de passe incorrect");
        }
        // catch : Procédez au processus de catch.
        catch (Exception $e)
        {
            throw $e;
        }
         // Démarrage ou restauration de la session
        session_start();
        //Enregistrez les détails de connexion dans $_SESSION
        $_SESSION["user"] = $user;

        return new UserSession($user);
    }

    public function disconnect()
    {
        session_destroy();
        $this->user = null;
    }

    public function isConnected() : bool
    {
        return $this->user != null;
    }

    public function changePassword($newPassword)
    {
        $this->user->changePassword($newPassword);
    }

    public static function printLoginForm($creation_account_page)
    {
        echo '
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" value="Se connecter">
        </form>    
        ';

        // <p><a href="'. $creation_account_page .'">Créer un compte</a></p>

    }

    public static function printChangePasswordForm()
    {
        echo '
        <form action="" method="post">
            <input type="password" name="oldPassword" placeholder="Mot de passe actuel">
            <input type="password" name="newPassword" placeholder="Nouveau mot de passe">
            <input type="password" name="newPassword2" placeholder="Répéter le nouveau mot de passe">
            <input type="submit" value="Modifier">
        </form>    
        ';
    }

}


?>