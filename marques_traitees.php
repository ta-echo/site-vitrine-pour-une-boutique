<?php

include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");





// TOP MAIN IMAGE
$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 1 AND type ='background'");
while($item = $results->fetch()) {
     echo "<div class='full-width-container-nested-parent' style='height: 100vh; background-image: url(". build_article_image_fullpath($item['filename']).")'></div>"; 
    }

    $results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 1 AND type ='foreground'");
    while($item = $results->fetch()) {
    echo "<div class='container-nested-child'>";
    echo '<p><img class="foreground_image" src="'. build_article_image_fullpath($item['filename']) .'"></p>';
    echo "</div>"; 
    }

    echo "</div>"; 

 // /!\ Margin top => Changer <br> => maargin-top
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";


// SUB IMAGE: Flexbox div start
echo "<div id='flexbox-sub'>";
// SUB IMAGES    
$results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 1 AND type ='content'");
while($item = $results->fetch()) {
  $link = '';
  if ($item["filename"] === "zyga-carre-re.png")
    $link="marque_zyga.php";
  elseif ($item["filename"] === "laboureur-carre-1.png")
    $link="marque_laboureur.php";
  elseif ($item["filename"] === "bensimon-carre.png")
    $link="marque_bensimon.php";


  //echo "<div class='flexbox-sub-item-s'>";
  echo "<div class='flexbox-sub-item-image-s'>";
  echo '<a href="'.$link.'" ><img src="'. build_article_image_fullpath($item["filename"]) . '"></a>';
  echo "</div>"; 
  //echo "</div>"; 
}

// Flexbox div fermée
echo "</div>"; 








//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';



include("footer.php");
?>