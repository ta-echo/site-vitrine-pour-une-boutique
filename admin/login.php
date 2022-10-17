<?php 

include("../constant.php");
include("../security/user_session.php");

$user_session = UserSession::getCurrentSession();
$errorMessage = "";

if ($_POST && $_POST["username"] != null && $_POST["password"] != null) {

    $user_session->disconnect();
    try //try, catch => if elseif else aussi ok!
    {
        $user_session = UserSession::connect($_POST["username"], md5($_POST["password"]));
       // On redirige vers le fichier index_admin.php
        header('Location: index_admin.php');
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body> 
    <div class="container">

        <img src="../images/am-logo.jpg" style="width: 150px; display: block; margin-left: auto; margin-right: auto;" alt="Accueil">
        <h2 class="titre"> ASPASIE ET MATHIEU <br> Admin connexion</h2>
    
        <?php 
        echo $errorMessage; 
        UserSession::printLoginForm('login_user_create.php');    
        ?>
    </div>
</body>
</html>