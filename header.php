<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ASPASIE & MATHIEU | Boutique Autentique | Quartier Latin, Paris 5 </title>
    
    <meta name="description" content="ASPASIE & MATHIEU vous propose de découvrir des collections
            de marques authentiques, matières naturelle : coton, lin et soie ; pour femmes et pour hommes. 
            Le Laboureur, Stetson, Bensimon, Zyga...">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="container">
<header class="header">

  <?php
  include("connect.php");
  $results = $pdo->query("SELECT * FROM header_bar");
  while($item = $results->fetch()) {
      echo '<div class="header-bar"><h3>' . $item["announcement"] . '</h3></div>';
      }
  ?>

<br>

<div class="header__inner">

<a href="index.php">
  <img src="images/am-logo.jpg" alt="Logo ASPASIE & MATHIEU" >
</a>

<nav class="header__nav nav" id="js-nav">
  <ul class="nav__items nav-items">
 
        <li class="item"><a href="marques_traitees.php">Marques traitées</a>
        <ul class="child">
        <li><a href="marque_zyga.php">ZYGA</a></li>
        <li><a href="marque_bensimon.php">BENSIMON</a></li>
        <li><a href="marque_laboureur.php">Le Laboureur</a></li>
        </ul>
        </li>
  
      <li class="nav-items__item"><a href="vintage.php">Vintage</a></li>
      <li class="nav-items__item"><a href="outfit.php">Outfit</a></li>
      <li class="nav-items__item"><a href="histoire.php">Histoire</a></li>
      <li class="nav-items__item"><a href="venez_voir.php">Venez voir</a></li>
  </ul>
</nav>

<!-- Menu Hamburger Trois Lignes -->
    <button class="header__hamburger hamburger" id="js-hamburger">
          <span></span>
          <span></span>
          <span></span>
    </button>


</div>
</header>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js"></script>


