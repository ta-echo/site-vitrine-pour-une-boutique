<?php

include("../constant.php");
include("../connect.php");
include("../security/user_session.php");

$user_session = UserSession::getCurrentSession();   
if (!$user_session->isConnected()){
  header('Location: login.php');
  exit;
}
else
{

  echo'
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta name="robots" content="noindex">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ASPASIE & MATHIEU | BackOffice</title>

      <link rel="stylesheet" href="../css/admin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
  <body>';
  

  echo '<div class="container-menu-hamburger">';
  echo '<header class="header">';

  echo '<div class="header__inner">';

  echo '<div>';
  echo '<a href="index_admin.php" class="logo2">ASPASIE ET MATHIEU BackOffice</a>';
  echo '</div>';

  //echo '<div>'; user 以外も ->　を使って修正する ! 
  echo '<nav class="header__nav nav" id="js-nav">
    <ul class="nav__items nav-items">
    <li class="nav-items__item"><a href="article_readdelete.php">Article</a></li>
    <li class="nav-items__item"><a href="article_image_readdelete.php">ArticleImage</a></li>
    <li class="nav-items__item"><a href="page_readdelete.php">Page</a></li>
    <li class="nav-items__item"><a href="page_image_readdelete.php">PageImage</a></li>

    <li class="nav-items__item"><a href="headerbar_annonce_readdelete.php">HeaderBar</a></li>
    <li class="nav-items__item"><a href="galerie_readdelete.php">Galerie</a></li>
    <li class="nav-items__item"><a href="user_manage.php">User</a></li>
    
    <div class="user-login">
    <li class="nav-items__item">' . $user_session->user->login . ' &nbsp;&nbsp;</li>';
    echo '<li class="nav-items__item"><img class="avatar-nav" src="../data/user_images/' . $user_session->user->avatar . '"></li>';
 
    echo '</div>

    <li class="nav-items__item"><a href="logout.php" class="btn">Déconnexion</a></li>
 
    </ul>
  </nav>';

  echo '
    <button class="header__hamburger hamburger" id="js-hamburger">
    <span></span>
    <span></span>
    <span></span>
    </button>';

  echo '</div>';
  echo '</header>';
  echo '</div>';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
  echo '<script src="../js/main.js"></script>';
}

?>