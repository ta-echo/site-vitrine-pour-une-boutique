<?php

include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");


// TOP MAIN IMAGE
$results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 2 AND type ='background'");
while($item = $results->fetch()) {
     echo "<div class='image-base full-width-container-nested-parent' style='height: 100vh; no-repeat fixed; background-image: url(". build_article_image_fullpath($item['filename']) .")'></div>"; 
    }

    $results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 2 AND type ='foreground'");
    while($item = $results->fetch()) {
    echo "<div class='container-nested-child'>";
    echo '<p><img class="foreground_image" src="'. build_article_image_fullpath($item['filename']) .'"></p>';
    echo "</div>"; 
    }

    echo "</div>"; 

 // /!\ Margin top => Changer <br> => maargin-top
  






// SUB: flexbox-image-text DIV START
echo "<div class='flexbox-image-text'>";

// SUB: IMAGE
$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 2 AND type ='content'");
while($item = $results->fetch()) {
echo '<div class="flex-image">';
echo '<img src="'. build_article_image_fullpath($item["filename"]) . '">';
echo "</div>";
}


// SUB: TEXT  
echo "<div class='flex-text'>";
$results = $pdo->query("SELECT * FROM page WHERE id_page = 2");
while($item = $results->fetch()) {
    //echo "<div class='flex-text'>";
    echo '<h3>' . $item["titre"] . '</h3>' . '<br>';
    echo '<p class="caption-small-visible">' . $item["text"] . '</p>';  
    echo "</div>";    
}


echo "</div>";






/*
// SUB IMAGE: Flexbox div start
echo "<div class='flexbox-image-text'>";
// SUB IMAGES    
$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 2 AND type ='content'");
while($item = $results->fetch()) {

  echo "<div class='flexbox-sub-item-s'>";

  echo "<div class='flexbox-sub-item-image-s'>";
  echo '<img src="'. build_article_image_fullpath($item["filename"]) . '">';
  echo "</div>"; 
  echo "<div class='flexbox-sub-item-image-s'>";
  echo "<h1>La plus belle sélection vintage 
  de chemises </h1>";
  echo "</div>"; 

  echo "</div>"; 
}

// Flexbox div fermée
echo "</div>"; 
echo "</div>"; 
*/

//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';

include("footer.php");
?>