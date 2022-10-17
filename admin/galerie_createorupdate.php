<?php
include('header_admin.php');
include("../entity/galerie_entity.php");

$message ="";
$action = "";
$type = "";
$caption = "";
$filename = "";
$id_image = "";
$galerie_image_id = null;
//$page_id = null;
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
        $galerie_image_id = $_GET['id'];
        $galerie_image = new GalerieImageEntity();
        $galerie_image->loadFromId($image_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $galerie_image = new GalerieImageEntity();
    $galerie_image->caption = $_POST['caption']; 
    $galerie_image->type = $_POST['type']; 
    $galerie_image->filename = $_FILES['file']['name'];
    
    if ($galerie_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $galerie_image->uploadGalerieImage($tmp_name);
        $message = "Galerie Image créé avec succès.";     
    }
    else    
        $message = "Galerie image n'a pas pu être enregistré.";

    $action="update";
    $galerie_image_id = $galerie_image->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $galerie_image = new GalerieImageEntity();
    $galerie_image->id =  $_POST['galerie_image_id'];
    $galerie_image->caption = $_POST['caption']; 
    $galerie_image->type = $_POST['type'];
    $galerie_image->filename=$_FILES['file']['name'];

    
    if ($galerie_image->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $galerie_image->uploadGalerieImage($tmp_name);
        $message = "Galerie Image mis à jour avec succès.";     
    }
    else
        $message = "Galerie Image n'a pas pu être enregistré.";
        
    $action="update";
    $galerie_image_id = $galerie_image->id;
}


echo '
<div class="flexbox-container">

    <div class="flexbox-item">';
// Mode create
if ($action=="create")
    echo '<h1>Creation : Galerie Image</h1>';
// Mode update    
else
    //echo '<h1>Modification : Article Image '. $article_image->filename.' (id '.$article_image->id.')</h1>';
echo '</div>';

echo '<div class="flexbox-item">
<p>'.$message.'</p>
<form action="" method="POST" enctype="multipart/form-data">
</div>


    <div class="flexbox-item">
    <label>Caption</label><br>
    <textarea name="caption" rows="5" cols="33" required placeholder="Caption"></textarea>
    </div>

    <div class="flexbox-item">
    <label>Type</label><br>
    <textarea name="type" rows="5" cols="33" required placeholder="Text"></textarea>
    </div>

    <div class="flexbox-item">
    <label>Filename</label><br>
    <input type="file" name="file" value="upload"/>
    </div>

    <div class="flexbox-item">
    <input type="submit" name="'.$action.'"/>
    </div>';

    // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
    if ($galerie_image_id != null)
        echo '<input type="hidden" name="galerie_image_id" value="'.$image_id.'"/>';

echo '</form>';
echo '</div>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='galerie_readdelete.php'  target='blank'>Retour à la gestion de Galerie</a>
</div>

<br>