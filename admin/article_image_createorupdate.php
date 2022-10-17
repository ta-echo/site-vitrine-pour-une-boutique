<?php
include('header_admin.php');
include("../entity/article_image_entity.php");

$message ="";
$action = "";
$type = "";
$filename = "";
$article_image_id = null;
$article_id = null;
$image_id = null;



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
        $article_image_id = $_GET['id'];
        $article_image = new ArticleImageEntity();
        $article_image->loadFromId($article_image_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $article_image = new ArticleImageEntity();
    //$article_image->id = $_POST['id_image'];
    $article_image->id_article = $_POST['id_article'];
    $article_image->type = $_POST['type'];
    $article_image->filename = $_FILES['file']['name'];
    
    if ($article_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $article_image->uploadArticleImage($tmp_name);
        $message = "Article Image créé avec succès.";     
    }
    else    
        $message = "L'article Image n'a pas pu être enregistré.";

    $action="update";
    $article_image_id = $article_image->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $article_image = new ArticleImageEntity();
    $article_image->id =  $_GET['id'];
    $article_image->id_article = $_POST['id_article'];
    $article_image->type = $_POST['type']; //!!!!!!!!!! text　だったので type 　に修正。このせいでエラーだったのかな？ !
    $article_image->filename=$_FILES['file']['name'];

    if ($article_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $article_image->uploadArticleImage($tmp_name);
        $message = "Article Image mis à jour avec succès.";     
    }
    else
        $message = "L'article Image n'a pas pu être enregistré.";
        
    $action="update";
    $article_image_id = $article_image->id;
}


echo '
<div class="flexbox-container">

    <div class="flexbox-item">';
// Mode create
if ($action=="create")
    echo '<h1>Creation : Image Article</h1>';
// Mode update    
else
    //echo '<h1>Modification : Article Image '. $article_image->filename.' (id '.$article_image->id.')</h1>';
echo '</div>';

echo '<div class="flexbox-item">
<p>'.$message.'</p>
<form action="" method="POST" enctype="multipart/form-data">
</div>


    <div class="flexbox-item">
    <label>Id Article</label><br>
    <input type="text" name="id_article" required placeholder="Id article">
    </div>

    <div class="flexbox-item">
    <label>Type</label><br>
    <select name="type" required>
        <option value="content">content</option>
        <option value="foreground">foreground</option>
        <option value="background">background</option>
    </select>
    </div>

    <div class="flexbox-item">
    <label>Filename</label><br>
    <input type="file" name="file" value="upload" required/>
    </div>

    <div class="flexbox-item">
    <input type="submit" name="'.$action.'"/>
    </div>';

    // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
    if ($article_image_id != null)
        echo '<input type="hidden" name="article_image_id" value="'.$article_id.'"/>';

echo '</form>';
echo '</div>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='article_image_readdelete.php'  target='blank'>Retour à la gestion des articles images</a>
</div>

<br>

