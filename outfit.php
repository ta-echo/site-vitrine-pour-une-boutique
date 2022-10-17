<?php
include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");

//<!-- div clear => Push Sticky Header For Hiding Content -->
//echo '<div class="clear-homepage-header"></div>';



// SUB: flexbox-image-text DIV START
echo "<div class='flexbox-image-text'>";

// SUB: IMAGE
$results = $pdo->query("SELECT * FROM galerie WHERE type='outfit'");
while($item = $results->fetch()) {
echo "<div class='flexbox-column'>";
echo '<div class="flex-image-outfit">';
echo '<img src="'. build_article_image_fullpath($item["filename"]) . '">';
echo "</div>";
echo '<p class="caption-smallest-visible">' . $item["caption"] . '</p>';  
echo '</div>';
}

echo '</div>';

//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';

include("footer.php");
?>