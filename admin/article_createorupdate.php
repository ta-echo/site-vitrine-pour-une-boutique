<?php
include('header_admin.php');
include("../entity/article_entity.php");

$message ="";
$action = "";
$article_id = null;
$article = null;



// Lorsque l'utilisateur ouvre la page depuis la page de gestion
// Il y a la variable $_GET qui indique s'il veut faire une création ou une update
if ($_GET && isset($_GET['action']) && !$_POST)
{
    $action = $_GET["action"];
    // Si l'action demandée n'est ni un create ni un update, on affiche une erreur
    if ($action != "create" && $action != "update")
        throw new Exception("Action not supported");
    // Si l'action est un update, alors on charge l'utilisateur pour afficher son nom dans le titre
    if ($action == "update" )
    {
        $article_id = $_GET['id'];
        $article = new ArticleEntity();
        $article->loadFromId($article_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau Article
if($_POST && isset($_POST['create'])){
    
    $article = new ArticleEntity();
    $article ->titre = $_POST['titre'];
    $article ->text = $_POST['text'];
    $article ->category = $_POST['category'];
    $article ->date = $_POST['date'];
    
    
    if ($article->save())
    {
       // $tmp_name=$_FILES['file']['tmp_name'];
      // $announcement->uploadAnnonce($tmp_name);
        $message = "Article créé avec succès.";     
    }
    else    
        $message = "L'article n'a pas pu être enregistré.";

    $action="update";
    $article_id = $article->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $article = new ArticleEntity();
    $article->id =  $_POST['article_id'];
    $article->titre = $_POST['titre'];
    $article->text = $_POST['text'];
    $article->category = $_POST['category'];
    $article->date = $_POST['date'];
    //$user->password=md5($_POST['password']);
    //$user->avatar=$_FILES['file']['name'];
    
    if ($article->save())
    {
        //$tmp_name=$_FILES['file']['tmp_name'];
        //$user->uploadAvatar($tmp_name);
        $message = "Article mis à jour avec succès.";     
    }
    else
        $message = "L'article n'a pas pu être enregistré.";
        
    $action="update";
    $article_id = $article->id;
}


echo '
<div class="flexbox-container">

    <div class="flexbox-item">';
// Mode create
if ($action=="create")
    echo '<h1>Creation : Article</h1>';
// Mode update    
else
    echo '<h1>Modification : Article '. $article->titre.' (id '.$article->id.')</h1>';
echo '</div>';

echo '<div class="flexbox-item">
<p>'.$message.'</p>
<form action="" method="POST" enctype="multipart/form-data">
</div>


    <div class="flexbox-item">
    <label>Titre</label><br>
    <input type="text" name="titre" required placeholder="Titre">
    </div>

    <div class="flexbox-item">
    <label>Text</label><br>
    <textarea name="text" rows="5" cols="33" required placeholder="Text"></textarea>
    </div>

    <div class="flexbox-item">
    <label>Category</label><br>
    <input type="text" name="category" required placeholder="Category">
    </div>

    <div class="flexbox-item">
    <label>Date</label><br>
    <input type="date" name="date" required placeholder="Date">
    </div>

    <div class="flexbox-item">
    <input type="submit" name="'.$action.'"/>
    </div>';

    // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
    if ($article_id != null)
        echo '<input type="hidden" name="article_id" value="'.$article_id.'"/>';

echo '</form>';
echo '</div>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='article_readdelete.php'  target='blank'>Retour à la gestion des articles</a>
</div>

<br>
