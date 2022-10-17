<?php

include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");



$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 4 AND type ='background'");
while($item = $results->fetch()) {
     echo "<div class='cd-fixed-bg cd-bg-1' style='background-image: url(". build_article_image_fullpath($item['filename']) .")'></div>"; 
    }
   
    $results = $pdo->query("SELECT * FROM page WHERE id_page = 4 ");
    while($item = $results->fetch()) {
    //echo "<div class='container-nested-child'>";
    echo '<div class="area">';
    echo '<p class="caption-large">' . $item["titre"] . '</p>' . '<br><br>';
    echo '</div>';

}


$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 4 AND type ='background'");
while($item = $results->fetch()) {
     echo "<div class='cd-fixed-bg cd-bg-1' style='background-image: url(". build_article_image_fullpath($item['filename']) .")'></div>"; 
    }



$results = $pdo->query("SELECT * FROM page WHERE id_page = 4 ");
while($item = $results->fetch()) {
//echo "<div class='container-nested-child'>";
echo '<div class="area">';
    echo '<p class="caption-small-histoire">' . $item["text"] . '</p>'; 
    echo '</div>';
    }

    //echo '</div>';
   //echo "</div>"; 
   //echo '<div class="cd-fixed-bg cd-bg-1">固定背景01</div>';


    $results = $pdo->query("SELECT * FROM page_image WHERE id_page = 4 AND type ='background'");
    while($item = $results->fetch()) {
         echo "<div class='cd-fixed-bg cd-bg-1' style='background-image: url(". build_article_image_fullpath($item['filename']) .")'></div>"; 
        }
 

include("footer.php");
?>