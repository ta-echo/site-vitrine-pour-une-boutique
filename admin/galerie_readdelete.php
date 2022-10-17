<?php
include('header_admin.php');
include("../entity/galerie_entity.php");

$message = "";
$galerie_image = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (GalerieImageEntity::delete($id))
            $message = "Galerie image ".$id." supprimé avec succès";
        else
            $message = "Galerie image ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$galerie_images = new GalerieImageEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Galerie Images</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>Caption</th>
<th>type</th>
<th>Filename</th>
<th>Filename preview</th>

<th>Edit</th>
<th>Delete</th>
</tr>";
foreach ($galerie_images->getGalerieImages() as $galerie_image){
    echo"<tr>";
    echo"<td>".$galerie_image->id."</td>";
    echo"<td>".$galerie_image->caption."</td>";
    echo"<td>".$galerie_image->type."</td>";
    echo"<td>".$galerie_image->filename."</td>";
    //display image
    echo"<td><img src='../data/galerie_images/".$galerie_image->filename ."' alt='$galerie_image->filename' width='50'></td>";
    //for edit and delete data
    echo"<td><a href='galerie_createorupdate.php?action=update&id=$galerie_image->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='galerie_readdelete.php?action=delete&id=$galerie_image->id'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='galerie_createorupdate.php?action=create'>Create a new Galerie image</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";





?>

<html>


<!-- Avant de POO -->
<!--
$select="SELECT *FROM article_image";
$result=mysqli_query($conn,$select)or die("could not display data");
echo "<div class='flexbox-container'>";

echo "<div class='flexbox-item'>";
echo "<h1>Read : Article image</h1>";
echo "</div>";


echo "<div class='flexbox-item'>";

echo"<table class='admin-table-read'>
<tr>
<th>ID Image</th>
<th>ID Article</th>

<th>Type</th>
<th>Filename</th>
<th>Image</th>

<th>Edite</th>
<th>Delete</th>
</tr>";

while($row=mysqli_fetch_array($result)){
    echo"<tr>";
    echo"<td>".$row['id_image']."</td>";
    echo"<td>".$row['id_article']."</td>";
    echo"<td>".$row['type']."</td>";
    echo"<td>".$row['filename']."</td>";
    //display image
    echo"<td><img src='../data/article_images/".$row['filename']."' alt='$row[filename]' width='100'></td>";
    //for edit and delete data
    echo"<td><a href='article_image_update.php?id=$row[id_image]'/>Edit</a></td>";
    echo"<td><a href='article_image_delete.php?id=$row[id_image]'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='article_image_create.php'>Insert a new record</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";
?>

<html>
    <head>
        <title>insert new data</title>
    </head>
    <body>
        <div><a class="a-body" href="user_create.php">insert a new record</a></div>
    </body>
</html>-->

