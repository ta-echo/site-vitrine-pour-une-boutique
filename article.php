<?php 

include("constant.php");
include("utils.php");
include("connect.php");
include("header.php");


// récupération et controle du id_article
if ($_GET <> null && $_GET["id_article"] <> null && is_numeric($_GET["id_article"]))
{
    $id_article = strval($_GET["id_article"]);

    // récupération de la base de données
    $stmt = $pdo->prepare("SELECT A.id_article, A.titre, A.text, A.date, A.category, B.filename as background_image, F.filename as foreground_image
        FROM article A 
        LEFT OUTER JOIN article_image B
        ON A.id_article = B.id_article AND B.type='background'
        LEFT OUTER JOIN article_image F
        ON A.id_article = F.id_article AND F.type='foreground'
        WHERE A.id_article = :id_article");

    $stmt->bindValue('id_article',$id_article, PDO::PARAM_INT);
    $result = $stmt->execute();

    // S'il n'y a pas eu d'erreur
    if (!is_null($result))
    {
        $article = null;
        while($item = $stmt->fetch()) {
            $article = $item;
            break;
        }
        if ($article == null)
            echo "Article non trouvé";
        else
        {
            $stmt = $pdo->prepare("SELECT * FROM article_image WHERE id_article=:id_article AND type='content' ORDER BY id_image");
            $stmt->bindValue('id_article',$id_article, PDO::PARAM_INT);
            $result = $stmt->execute();
            $images = array();
            while($item = $stmt->fetch()) {
                array_push($images, $item["filename"]);
                echo $item['filename']."<br>";
            }

            print_article($article, $images);
        }
    }

    // affichage de l'article


// erreur
}
else
{
    echo "Pas d'article";
}


function print_article($article, $images)
{
    /*
    $images = array("zyga-ete-2022-01.jpg", "zyga-ete-2022-02.jpg", "chapeau01_640.jpg", "chapeau02_640.jpg", "logo-fleurs-d-ascenseurs-min.png", "model-fleurs-d-ascenseurs.jpg","accessoires-fleurs-d-ascenseurs.jpg", "fleurs-d-ascenseurs-adresse.jpg","image-lea-forch-01.jpg","image-lea-forch-02.jpg", "image-lea-forch-03.jpg","image-lea-forch-04.jpg","photo-lea-forch.jpg", "logo-lea-forch.png");
    $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.
    {{IMAGE:1}}
    Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.
    {{IMAGE:2}}
    Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.
    ";
    */

    echo "<style> #article_" . (string)($article['id_article']) . "{background-image: url(". build_article_image_fullpath($article["background_image"]) ."); background-repeat:no-repeat; background-size: cover;}    no-repeat fixed ; </style>";
    echo "<div id='article_" . (string)$article['id_article'] . "' class='full-width-container article_banner'>";
    echo "<div class='flexbox-column background_black_opacity_80 '>";
    echo "</div>";
    echo "</div>";

    echo '<div class="full-width-container">';
    echo '<div class="mid-width-container">';
    echo '<br><br><br>';
    echo '<h1 class="h1-lh">'.$article["titre"].'</h1>';
    echo '<br><br>';

    $text = $article["text"];

    $index = 1;
    while ($index <= count($images))
    {
        $image = $images[$index-1];
        $pattern="{{IMAGE:".$index."}}";
        $text = str_replace($pattern, '<br><img style="display: block; margin: auto;"'."src='".build_article_image_fullpath($image)."'>" , $text);
        $index ++;
    }

    echo '<div style="text-align:center;"><p class="caption-small-visible">' . $text . '</p></div>';


    echo '</div>';
    echo '</div>';

}

//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';

include("footer.php");