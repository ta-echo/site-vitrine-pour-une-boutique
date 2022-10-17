<footer class="footer-sticky">
    <div class="footer-wrap">

        <div class="footer-menu-1">
            <h2>ASPASIE ET MATHIEU</h2>
            <br>
            <ul class="foot-1">
                <li><h3>Quartier Latin – Paris</h3></li>
                <li>10, rue des Carmes – 75005 Paris</li>
                <li>Tel : (+33) 9 88 58 57 35</li>
                <li class="space"></li>         
                <li><h3>Heures d’ouverture :</h3></li>
                <li>Lundi au Samedi : 11h00 – 19h00</li>
                <li>Dimanche : 13h30 – 18h00</li>
                <li class="space"></li>        
                <li><a href="https://www.instagram.com/aspasie_et_mathieu/"><img src ="images/instagram-brands.svg" alt="instagram" width="25" height="25"/></a></li>
            </ul>
        </div>

        <div class="footer-menu-2">
            <h3>Quick Links</h3>
            <br>
            <ul class="foot-2">
                <li><a href="marques_traitees.php">Marques traitées</a></li>
                <li><a href="marque_zyga.php">ZYGA</a></li>
                <li><a href="marque_bensimon.php">BENSIMON</a></li>
                <li><a href="marque_laboureur.php">Le Laboureur</a></li>
                <li class="space"></li>
                <li><a href="vintage.php">Vintage</a></li>
                <li><a href="outfit.php">Outfit</a></li>
                <li><a href="histoire.php">Histoire</a></li>
                <li><a href="venez_voir.php">Venez voir</a></li>
            </ul>
        </div>



  <div class="footer-menu-3">
  <h3>Recent Posts</h3>
    <br>
      <?php
      $results = search_most_recent_article_footer("Collaboration", 2);
      print_articles_side_by_side_footer($results);

      // FUNCTIONS
      function search_most_recent_article_footer($category, $limit)
      {
        global $pdo;
        $stmt = $pdo->prepare("SELECT A.id_article, A.text, A.titre, A.date, A.category, B.filename as background_image, F.filename as foreground_image
        FROM article A 
        LEFT OUTER JOIN article_image B
        ON A.id_article = B.id_article AND B.type='background'
        LEFT OUTER JOIN article_image F
        ON A.id_article = F.id_article AND F.type='foreground'
        WHERE category= :category
        ORDER BY date DESC LIMIT :limit
        ");

        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue('category', $category, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
      }


      function print_articles_wide_footer($results)
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
            echo '<ul class="foot-3">';
            foreach ($articles as $article)
              print_article_artist_footer($article);
            echo '</ul>';
          }
        }
        else
        {
          echo "<p>Une erreur est survenue</p>";
        }
      }

      function print_articles_side_by_side_footer($results)
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
            echo '<ul class="foot-3">';
            foreach ($articles as $article)
              print_article_artist_footer($article);
            echo '</ul>';
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

      // Affichage des articles collaboration
      function print_article_artist_footer($article)
      {
          echo '<li style="text-align: left;"><a href="article.php?id_article='. (string)$article['id_article'] .'">'. $article["titre"] . '</a></li>';
      }   
        ?>
            
    <br><br>
    <h3>Information</h3>
    <br>
    <ul class="foot-3">
      <li><a href="privacy_policy.php">Politique de confidentialité</a></li>
      <li><a href="legal.php">Mentions légales</a></li>
    </ul>
  </div>



  <div class="footer-menu-4">
    <h3>Galerie</h3>
    <br>  
    <?php
      // SUB: flexbox-image-text DIV START
      echo '<div style="display:flex; flex-wrap: wrap;">';

      // SUB: IMAGE
      $results = $pdo->query("SELECT * FROM galerie WHERE type='galerie'");
      while($item = $results->fetch()) {
        echo '<div class="flex-image-galerie-footer">';
        echo '<img src="'. build_article_image_fullpath($item["filename"]) . '" alt="'. substr($item["caption"], 20) .'">';
        echo "</div>";
      }

      echo '</div>';
    ?>
  </div>

  </div>
  
  <div class="footer-bar"><p>©Copyright - ASPASIE & MATHIEU 2022</p></div>

</footer>
</body>
</html>