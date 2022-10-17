<?php
include('header_admin.php');
include("../entity/page_image_entity.php");

$message = "";
$page_image = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (PageImageEntity::delete($id))
            $message = "Page image ".$id." supprimé avec succès";
        else
            $message = "Le page image ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$page_images = new PageImageEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Page Images</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>ID Page</th>
<th>Type</th>
<th>Filename</th>
<th>Filename preview</th>

<th>Edit</th>
<th>Delete</th>
</tr>";

foreach ($page_images->getPageImages() as $page_image){
    echo"<tr>";
    echo"<td>".$page_image->id."</td>";
    echo"<td>".$page_image->id_page."</td>";
    echo"<td>".$page_image->type."</td>";
    echo"<td>".$page_image->filename."</td>";
    //display image
    echo"<td><img src='../data/page_images/".$page_image->filename ."' alt='$page_image->filename' width='50'></td>";
    //for edit and delete data
    echo"<td><a href='page_image_createorupdate.php?action=update&id=$page_image->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='page_image_readdelete.php?action=delete&id=$page_image->id'/>Delete</a></td>";
    echo"</tr>";
}

echo"</table>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='page_image_createorupdate.php?action=create'>Create a new page image</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>

<html>


<!-- Avant de POO -->
<!--
// requete pour avoir la liste des page
$select="SELECT distinct id_page FROM page";
// Construction d'une dropdonwlist
$result=mysqli_query($conn,$select);
$pageitems='';

while($row=mysqli_fetch_array($result)){
    $id_page=$row['id_page'];

    $pageitems .= '<option value="'.$id_page.'">Page '.$id_page.'</option>';
}



$select="SELECT * FROM page_image";
$result=mysqli_query($conn,$select) or die("could not display data");
echo "<div class='flexbox-container'>";

echo "<div class='flexbox-item'>";
echo "<h1>Read : Page image</h1>";
echo "</div>";


echo "<div class='flexbox-item'>";

echo"<table class='admin-table-read'>
<tr>
<th>ID Image</th>
<th>ID Page</th>

<th>Type</th>
<th>Filename</th>
<th>Image</th>

<th>Edite</th>
<th>Delete</th>
</tr>";

while($row=mysqli_fetch_array($result)){
    echo"<tr>";
    echo"<td>".$row['id_image']."</td>";
    //echo"<td>".$row['id_page']."</td>";
    echo '<td><select name="select_page_image_'.$row['id_image'].'">';
    echo $pageitems;
    echo '</select></td>';
    echo"<td>".$row['type']."</td>";
    echo"<td>".$row['filename']."</td>";
    //display image
    echo"<td><img src='../data/article_images/".$row['filename']."' alt='$row[filename]' width='100'></td>";
    //for edit and delete data
    echo"<td><a href='page_image_update.php?id=$row[id_image]'/>Edit</a></td>";
    echo"<td><a href='page_image_delete.php?id=$row[id_image]'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='page_image_create.php'>Insert a new record</a>";
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