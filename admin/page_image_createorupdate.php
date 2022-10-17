<?php
include('header_admin.php');
include("../entity/page_image_entity.php");

$message ="";
$action = "";
$type = "";
$filename = "";
$page_image_id = null;
$page_id = null;
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
        $page_image_id = $_GET['id'];
        $page_image = new PageImageEntity();
        $page_image->loadFromId($page_image_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $page_image = new PageImageEntity();
    $page_image->id_page = $_POST['id_page'];
    $page_image->type = $_POST['type']; /* Error */
    $page_image->filename = $_FILES['file']['name'];
    
    if ($page_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $page_image->uploadPageImage($tmp_name);
        $message = "Page Image créé avec succès.";     
    }
    else    
        $message = "Le page image n'a pas pu être enregistré.";

    $action="update";
    $page_image_id = $page_image->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $page_image = new PageImageEntity();
    $page_image->id =  $_POST['image_id'];
    $page_image->id_page = $_POST['id_page'];
    $page_image->type = $_POST['type']; //!!!!!!!!!! text　だったので type 　に修正。このせいでエラーだったのかな？ !!!!!!!!!!!!!!!!
    $page_image->filename=$_FILES['file']['name'];
    
    if ($page_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $page_image->uploadPageImage($tmp_name);
        $message = "Page Image mis à jour avec succès.";     
    }
    else
        $message = "Le page Image n'a pas pu être enregistré.";
        
    $action="update";
    $page_image_id = $page_image->id;
}


echo '
<div class="flexbox-container">

    <div class="flexbox-item">';
// Mode create
if ($action=="create")
    echo '<h1>Creation : Image Page</h1>';
// Mode update    
else
    //echo '<h1>Modification : Article Image '. $article_image->filename.' (id '.$article_image->id.')</h1>';
echo '</div>';

echo '<div class="flexbox-item">
<p>'.$message.'</p>
<form action="" method="POST" enctype="multipart/form-data">
</div>


    <div class="flexbox-item">
    <label>Id Page</label><br>
    <input type="text" name="id_page" required placeholder="Id de la page">
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
    <input type="file" name="file" value="upload"/>
    </div>

    <div class="flexbox-item">
    <input type="submit" name="'.$action.'"/>
    </div>';

    // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
    if ($page_image_id != null)
        echo '<input type="hidden" name="page_image_id" value="'.$page_id.'"/>';

echo '</form>';
echo '</div>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='page_image_readdelete.php'  target='blank'>Retour à la gestion des pages images</a>
</div>

<br>
