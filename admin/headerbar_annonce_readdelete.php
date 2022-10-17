<?php
include('header_admin.php');
include("../entity/headerbar_annonce_entity.php");

/* copy de user_manage.php */

$message = "";
$announcements = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (AnnonceEntity::delete($id))
            $message = "Announcement ".$id." supprimé avec succès";
        else
            $message = "L'announcement ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$announcements = new AnnonceEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Announcements</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>Announcement</th>
<th>Edit</th>
<th>Delete</th>
</tr>";
//$announcements = new AnnonceEntityList(true);
foreach ($announcements->getAnnonces() as $announcement){
    echo"<tr>";
    echo"<td>".$announcement->id."</td>";
    echo"<td>".$announcement->annonce."</td>";

    //for edit and delete data
    echo"<td><a href='headerbar_annonce_createorupdate.php?action=update&id=$announcement->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='headerbar_annonce_readdelete.php?action=delete&id=$announcement->id'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='headerbar_annonce_createorupdate.php?action=create'>Create a new announcement</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>

<html>
