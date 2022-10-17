<?php
include('header_admin.php');

$message = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (UserEntity::delete($id))
            $message = "Utilisateur ".$id." supprimé avec succès";
        else
            $message = "L'utilisateur ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$users = new UserEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Users</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>Username</th>
<th>Password (encrypted)</th>
<th>Avatar file</th>
<th>Avatar preview</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
foreach ($users->getUsers() as $user){
    echo"<tr>";
    echo"<td>".$user->id."</td>";
    echo"<td>".$user->login."</td>";
    echo"<td>".$user->password."</td>";
    echo"<td>".$user->avatar."</td>";
    //display image
    echo"<td><img src='../data/user_images/".$user->avatar ."' alt='$user->login' width='50'></td>";
    //for edit and delete data
    echo"<td><a href='user_createorupdate.php?action=update&id=$user->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='user_manage.php?action=delete&id=$user->id'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='user_createorupdate.php?action=create'>Create a new admin user</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>

<html>