
<?php
include('header_admin.php');
$message = "";
$action = "";
$user_id = null;
$user = null;

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
        $user_id = $_GET['id'];
        $user = new UserEntity();
        $user->loadFromId($user_id);
    }
}

// Soit on vient d'envoyer le formulaire de création
// Dans ce cas, il faut créer un nouveau User
if($_POST && isset($_POST['create'])){
    
    $user = new UserEntity();
    $user->login = $_POST['username'];
    $user->password=md5($_POST['password']);
    $user->avatar=$_FILES['file']['name'];
    
    if ($user->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $user->uploadAvatar($tmp_name);
        $message = "Utilisateur créé avec succès.";     
    }
    else
        $message = "L'utilisateur n'a pas pu être enregistré.";

    $action="update";
    $user_id = $user->id;
}
// Soit on vient d'envoyer le formulaire d'update
// Dans ce cas, on récupère l'ID de l'utilisteur dans le formulaire puis on l'enregistre
else if($_POST && isset($_POST['update'])){
    
    $user = new UserEntity();
    $user->id =  $_POST['user_id'];
    $user->login = $_POST['username'];
    $user->password=md5($_POST['password']);
    $user->avatar=$_FILES['file']['name'];
    
    if ($user->save())
    {
        $tmp_name=$_FILES['file']['tmp_name'];
        $user->uploadAvatar($tmp_name);
        $message = "Utilisateur mis à jour avec succès.";     
    }
    else
        $message = "L'utilisateur n'a pas pu être enregistré.";
        
    $action="update";
    $user_id = $user->id;
}


    echo '
    <div class="flexbox-container">
        <div class="flexbox-item">';

    // Mode create
    if ($action=="create")
        echo '<h1>Creation : User</h1>';
    // Mode update    
    else
        echo '<h1>Modification : User '.$user->login.' (id '.$user->id.')</h1>';

    echo '</div>';

    echo '<div class="flexbox-item">
    <p>'.$message.'</p>
    <form action="user_createorupdate.php" method="POST" enctype="multipart/form-data">
        <label>UserName</label>
        <br>
        <input type="text" name="username" required placeholder="login">
        <br>
        <label>Password</label>
        <br>
        <input type="password" name="password" required placeholder="Password">
        <br>
        <label>Avatar</label><br>
        <input type="file" name="file" value="upload"/>
        <br>
        <br>
        <input type="submit" name="'.$action.'"/>
        ';
        // Lorsqu'on est en mode "update" il faut ajouter l'id dans le formulaire, mais on le cache (hidden)
        if ($user_id != null)
            echo '<input type="hidden" name="user_id" value="'.$user_id.'"/>';

echo '</form>';
?>

    <div class='flexbox-item'>
        <a class='a-body' href='user_manage.php'  target='blank'>Retour à la gestion des utilisateurs</a>
    </div>
</div>