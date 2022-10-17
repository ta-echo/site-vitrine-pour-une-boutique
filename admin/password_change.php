<?php

include("../constant.php");
include("../security/user_session.php");

$user_session = UserSession::getCurrentSession();
$errorMessage = "";

if (!$user_session->isConnected())
{
    $errorMessage = "Vous n'êtes pas connecté";
}
else if ($_POST) {
    $oldPassword = md5($_POST["oldPassword"]);
    $newPassword = md5($_POST["newPassword"]);
    $newPassword2 = md5($_POST["newPassword2"]);

    if ($oldPassword == $user_session->user->password) {
        if ($newPassword == $newPassword2) {

          try {
            $user_session->changePassword($newPassword);
            $user_session->disconnect();
          }
          catch (Exception $e)
          {
            $errorMessage = $e->getMessage();
          }
          
          header('Location: login.php');

        }
        else
            $errorMessage = "Les 2 mots de passe ne correspondent pas.";
    }
    else
        $errorMessage = "Le mot de passe actuel que vous avez saisi est erroné.";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="../css/main_user.css">
</head>
<body> 
    <div class="container">

        <img src="../images/am-logo.jpg" style="width: 150px; display: block; margin-left: auto; margin-right: auto;" alt="Accueil">
        <h2 class="titre"> ASPASIE ET MATHIEU <br> Changement de mot de passe</h2>
    
        <?php 
        echo $errorMessage;
        if ($user_session->isConnected())
        {
            echo '<p>User login: '. $user_session->user->login .'</p>';
            UserSession::printChangePasswordForm(); 
        }   
        ?>
    </div>
</body>
</html>