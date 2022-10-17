<?php
include('header_admin.php');
include("../entity/headerbar_annonce_entity.php");

$message ="";
$announcement = "";
$announcement_id = null;


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
        $announcement_id = $_GET['id'];
        $announcement = new AnnonceEntity();
        $announcement->loadFromId($announcement_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $announcement = new AnnonceEntity();
    $announcement ->annonce = $_POST['announcement'];
    //$user->password=md5($_POST['password']);
   // $user->avatar=$_FILES['file']['name'];
    
    if ($announcement->save())
    {
       // $tmp_name=$_FILES['file']['tmp_name'];
      // $announcement->uploadAnnonce($tmp_name);
        $message = "Announcement créé avec succès.";     
    }
    else    
        $message = "L'announcement n'a pas pu être enregistré.";

    $action="update";
    $announcement_id = $announcement->id;
}




// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    //Entityを新しく用意する
    $announcement = new AnnonceEntity();

    //Entityに値をセットする
    $announcement->id =  $_POST['announcement_id'];
    $announcement->annonce = $_POST['announcement'];

    //DBに保存
    if ($announcement->save())
    {
        $message = "Announcement mis à jour avec succès.";     
    }
    else
        $message = "L'announcement n'a pas pu être enregistré.";
        
    $action="update";
    $announcement_id = $announcement->id;
}


echo '
<div class="flexbox-container">
    <div class="flexbox-item">';

// Mode create
if ($action=="create")
    echo '<h1>Creation : Announcement</h1>';
// Mode update    
else
    echo '<h1>Modification : Announcement '. $announcement->annonce.' (id '.$announcement->id.')</h1>';

echo '</div>';

echo '<div class="flexbox-item">
<p>'.$message.'</p>
<form action="headerbar_annonce_createorupdate.php" method="POST" enctype="multipart/form-data">
    <label>Announcement</label>
    <br>
    <input type="text" name="announcement" required placeholder="Announcement">
    <br>
    <input type="submit" name="'.$action.'"/>
    ';
    // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
    if ($announcement_id != null)
        echo '<input type="hidden" name="announcement_id" value="'.$announcement_id.'"/>';

echo '</form>';
?>

<div class='flexbox-item'>
    <a class='a-body' href='headerbar_annonce_readdelete.php'  target='blank'>Retour à la gestion des announcements</a>
</div>
</div>
