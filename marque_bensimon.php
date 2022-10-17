<?php
include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");
//<!-- div clear => Push Sticky Header For Hiding Content -->
echo '<div class="clear-homepage-header"></div>';






// SUB: flexbox-image-text DIV START
echo "<div class='flexbox-image-text'>";

// SUB: IMAGE
$results = $pdo->query("SELECT * FROM page_image WHERE id_page = 8 AND type ='content'");
while($item = $results->fetch()) {
echo '<div class="flex-image">';
echo '<img src="'. build_article_image_fullpath($item["filename"]) . '">';
echo "</div>";
}


// SUB: TEXT  
echo "<div class='flex-text'>";
$results = $pdo->query("SELECT * FROM page WHERE id_page = 8");
while($item = $results->fetch()) {
    //echo "<div class='flex-text'>";
    echo '<h3>' . $item["titre"] . '</h3>' . '<br>';
    echo '<p class="caption-small-visible">' . $item["text"] . '</p>';  
    echo "</div>";    
}



echo '</div>';

//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';







include("footer.php");
?>