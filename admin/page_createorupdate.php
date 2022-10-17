<?php
include('header_admin.php');
include("../entity/page_entity.php");

$message ="";
$action = "";
$page_id = null;
$page = null;



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
        $page_id = $_GET['id'];
        $page = new PageEntity();
        $page->loadFromId($page_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $page = new PageEntity();
    $page ->titre = $_POST['titre'];
    $page ->text = $_POST['text'];
    $page ->category = $_POST['category'];
    $page ->date = $_POST['date'];
    //$user->password=md5($_POST['password']);
   // $user->avatar=$_FILES['file']['name'];
    
    if ($page->save())
    {
       // $tmp_name=$_FILES['file']['tmp_name'];
      // $announcement->uploadAnnonce($tmp_name);
        $message = "Page créé avec succès.";     
    }
    else    
        $message = "Le page n'a pas pu être enregistré.";

    $action="update";
    $page_id = $page->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $page = new PageEntity();
    $page->id =  $_POST['page_id'];
    $page->titre = $_POST['titre'];
    $page->text = $_POST['text'];
    $page->category = $_POST['category'];
    $page->date = $_POST['date'];
    //$user->password=md5($_POST['password']);
    //$user->avatar=$_FILES['file']['name'];
    
    if ($page->save())
    {
        //$tmp_name=$_FILES['file']['tmp_name'];
        //$user->uploadAvatar($tmp_name);
        $message = "Page mis à jour avec succès.";     
    }
    else
        $message = "Le page n'a pas pu être enregistré.";
        
    $action="update";
    $page_id = $page->id;
}


echo '
<div class="flexbox-container">

    <div class="flexbox-item">';
// Mode create
if ($action=="create")
    echo '<h1>Creation : Article</h1>';
// Mode update    
else
    echo '<h1>Modification : Page '. $page->titre.' (id '.$page->id.')</h1>';
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
    if ($page_id != null)
        echo '<input type="hidden" name="page_id" value="'.$page_id.'"/>';

echo '</form>';
echo '</div>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='page_readdelete.php'  target='blank'>Retour à la gestion des pages</a>
</div>

<br>

