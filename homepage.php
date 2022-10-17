<?php


include("header.php");

//<!-- div clear => Push Sticky Header For Hiding Content -->
echo '<div class="clear-homepage-header"></div>';

$results = search_most_recent_article("Announcement", 1);
print_articles_wide($results);

$results = search_most_recent_article("Article", 1);
print_articles_wide($results);

echo "<div>";
echo "<p class='caption-large'>Collaboration artistes et créateurs</p>"; 
echo "</div>"; 

$results = search_most_recent_article("Collaboration", 2);
print_articles_side_by_side($results);


// FUNCTIONS
function search_most_recent_article($category, $limit)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT A.id_article, A.text, A.titre, A.date, A.category, B.filename as background_image, F.filename as foreground_image
  FROM article A 
  LEFT OUTER JOIN article_image B
  ON A.id_article = B.id_article AND B.type='background'
  LEFT OUTER JOIN article_image F
  ON A.id_article = F.id_article AND F.type='foreground'
  WHERE category=:category
  ORDER BY date DESC LIMIT :limit
  ");

  $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
  $stmt->bindValue('category', $category, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt;
}


function print_articles_wide($results)
{
  // S'il n'y a pas eu d'erreur
  if (!is_null($results))
  {
    $articles = array();

    while($item = $results->fetch()) {
      array_push($articles, $item);
    }

    // S'il y a bien au moins 1 article
    if (count($articles) > 0)
    {
      // Boucle sur chaque article et affichage
      foreach ($articles as $article)
        print_article_homepage($article);
    }
    else
    {
      //echo "<p>Il n'y a pas d'articles</p>";
    }
  }
  else
  {
    echo "<p>Une erreur est survenue</p>";
  }
}

function print_articles_side_by_side($results)
{
  // S'il n'y a pas eu d'erreur
  if (!is_null($results))
  {
    $articles = array();

    while($item = $results->fetch()) {
      array_push($articles, $item);
    }

    // S'il y a bien au moins 1 article
    if (count($articles) > 0)
    {
      echo '<div class="flexbox-row full-width-container">';
      // Boucle sur chaque article et affichage
      foreach ($articles as $article)
        print_article_artist_homepage($article);
      echo '</div>';
      }
    else
    {
      echo "<p>Il n'y a pas d'articles sur les artistes</p>";
    }
  }
  else
  {
    echo "<p>Une erreur est survenue</p>";
  }
}

// ---- AFFICHAGE
// Affichage des articles normaux
function print_article_homepage($article)
{
  echo "<style> #article_" . (string)($article['id_article']) . "{background-image: url(". build_article_image_fullpath($article["background_image"]) ."); background-repeat:no-repeat; background-size: cover;}    no-repeat fixed ; </style>";
  echo "<div id='article_" . (string)$article['id_article'] . "' class='full-width-container'>";

  echo "<div class='flexbox-column background_black_opacity_80 article_container'>";

  echo "<div class='flexbox-item'>";
  echo '<p><img class="foreground_image" src="'. build_article_image_fullpath($article["foreground_image"]) . '" alt="Photo de l\'intérieur de la boutique Aspasie & Mathieu"></p>';
  echo "</div>";

  echo "<div class='flexbox-item'>";
  echo '<p class="text-titre-article"><h1 style="color:white;">'. $article["titre"] .'</h1></p>';
  echo "</div>";

  echo "<div class='flexbox-item'>"; 
  echo '<a href="article.php?id_article='. (string)$article['id_article'] .'"><button class="btn_04">Découvrir</button></a>';
  echo "</div>";
  
  echo "</div>";
  echo "</div>"; 

  echo "<br>";
  echo "<br>";
}


// Affichage des articles collaboration
function print_article_artist_homepage($article)
{

  echo "<div class='flexbox-flex'>";

  echo "<div class='flexbox-sub-item'>";

  echo "<div class='flexbox-sub-item-image'>";
  echo '<img src="'. build_article_image_fullpath($article["foreground_image"]) . '" alt="Photo des créateurs collaborateurs">';
  echo "</div>";

  echo '<p class="flexbox-sub-item-title caption-medium"><a href="article.php?id_article='. (string)$article['id_article'] .'">'. $article["titre"] . '</a></p>';
  echo "<br>";
  echo '<p class="flexbox-sub-item-text caption-small"><a href="article.php?id_article='. (string)$article['id_article'] .'">'. $article["text"] . '</a></p>';
  echo "<br>";
  echo '<time class="datetime" datetime="'. $article["date"].'"><p>'. mysqldate_tostring($article["date"]).'</p></time>';

  echo "</div>";

  echo "</div>";
}

//<!-- div clear => Push Sticky Footer For Hiding Content -->
echo '<div class="clear-homepage-footer"></div>';
echo "<br>";
echo "<br>";

include("footer.php");

?>


