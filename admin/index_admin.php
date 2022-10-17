<?php

require('header_admin.php');

//<!-- div clear => Push Sticky Header For Hiding Content -->
echo '<div class="clear-homepage-header"></div>';

  echo '<br>';
  echo '<br>';
  
  echo '<div class="flexbox-container">';
  
  echo '<div class="wrapper-four-buttons">';
           
              echo '<div class="one"><a href="article_readdelete.php">Gestion des Articles</a></div>';
              echo '<div class="one"><a href="article_image_readdelete.php">Gestion des Articles images</a></div>';
              echo '<div class="one"><a href="page_readdelete.php">Gestion des Pages</a></div>';
              echo '<div class="one"><a href="page_image_readdelete.php">Gestion des Pages images</a></div>';
        
       
  echo '</div>';
  
  echo '<br>';
  echo '<br>';
  
  echo '<div class="wrapper-four-buttons">';
              echo '<div class="one"><a href="headerbar_annonce_readdelete.php">Gestion des Annoncement Header Bar</a></div>';
              echo '<div class="one"><a href="galerie_readdelete.php">Gestion de Galerie</a></div>';
              echo '<div class="one"><a href="user_manage.php">Gestion des Users</a></div>';
  echo '</div>';
  
  echo '</div>';

  //<!-- div clear => Push Sticky Footer For Hiding Content -->
  echo '<div class="clear-homepage-footer"></div>';
  echo "<br>";
  echo "<br>";

include("footer_admin.php");

?>







