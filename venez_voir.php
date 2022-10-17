<?php
include("connect.php");
include("constant.php");
include("utils.php");
include("header.php");




//<!-- div clear => Push Sticky Header For Hiding Content -->
echo '<div class="clear-homepage-header"></div>';



// TOP MAIN IMAGE
$results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 5 AND type ='background'");
while($item = $results->fetch()) {
  
    echo "<div class='full-width-container-nested-parent background_black_opacity_80'>";
    echo "<div class='full-width-container-nested-parent' style='height: 100vh; mix-blend-mode: multiply; opacity: 0.8; background-image: url(". build_article_image_fullpath($item['filename']).")'></div>"; 
    }

    echo "</div>";  
  
    $results = $pdo->query("SELECT * FROM  page_image WHERE id_page = 5 AND type ='foreground'");
    while($item = $results->fetch()) {

    

  
    echo "<div class='container-nested-child-venez-voir'>";
        
    echo "<div class='flexbox-flex'>";

    //echo "<div class='flexbox-item'>";
    echo "<div class='flexbox-column'>";

    echo "<div class='flexbox-item'>";
    echo '<p><img class="foreground_image_s" src="'. build_article_image_fullpath($item['filename']) .'"></p>';
    echo "</div>";  
    
echo "<br>";

    echo "<div class='flexbox-item'>";
    echo "<ul>
        <li class='white'><h2 class='white-h2'>ASPASIE ET MATHIEU</h2></li>
        <br>
        <li class='white'><h3 class='white-h3'>Quartier Latin – Paris</h3></li>
        <li class='white'>10, rue des Carmes – 75005 Paris</li>
        <li class='white'>Tel : (+33) 9 88 58 57 35</li>
        </ul><br>
        <ul>
        <li class='white'><h3 class='white-h3'>Heures d’ouverture :</h3></li>
        <li class='white'>Lundi au Samedi : 11h00 – 19h00</li>
        <li class='white'>Dimanche : 13h30 – 18h00</li></ul>";
    echo "</div>";
    
    
    //echo "</div>";
   
    echo "</div>";

    echo "<div class='flexbox-item' style='margin-left:50px;'>";


    echo '<div class="mapouter"><div class="gmap_canvas"><iframe width="800" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q=10,%20rue%20des%20Carmes%20%E2%80%93%2075005%20Paris&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:600px;width:800px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:800px;}</style></div></div>';

    //echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.9597132242259!2d2.347410351146485!3d48.849490195319575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671e6eef1aed9%3A0xf9c5ecf0a6abfebd!2sAspasie%20Et%20Mathieu%20Evelyne!5e0!3m2!1sfr!2sfr!4v1655397232736!5m2!1sfr!2sfr" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">';
    echo "</div>";

    echo "</div>";  

    }

    echo "</div>"; 
  



 // /!\ Margin top => Changer <br> => maargin-top
   /* echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";*/





//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';

include("footer.php");


?>