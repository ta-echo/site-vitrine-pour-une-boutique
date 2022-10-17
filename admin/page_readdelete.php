<?php
include('header_admin.php');
include("../entity/page_entity.php");


$message = "";
$pages = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (PageEntity::delete($id))
            $message = "Page ".$id." supprimé avec succès";
        else
            $message = "Le page ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$pages = new PageEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Pages</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>Titre</th>
<th>Text</th>
<th>Category</th>
<th>Date</th>

<th>Edit</th>
<th>Delete</th>
</tr>";
//$announcements = new AnnonceEntityList(true);
foreach ($pages->getPages() as $page){
    echo"<tr>";
    echo"<td>".$page->id."</td>";
    echo"<td>".$page->titre."</td>";
    echo"<td>".$page->text."</td>";
    echo"<td>".$page->category."</td>";
    echo"<td>".$page->date."</td>";


    //for edit and delete data
    echo"<td><a href='page_createorupdate.php?action=update&id=$page->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='page_readdelete.php?action=delete&id=$page->id'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='page_createorupdate.php?action=create'>Create a new page</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>

<html>









<!-- Avant de POO -->
<!--
$select="SELECT *FROM page";
$result=mysqli_query($conn,$select)or die("could not display data");
echo "<div class='flexbox-container'>";

echo "<div class='flexbox-item'>";
echo "<h1>Read : Pages</h1>";
echo "</div>";

echo "<div class='flexbox-item'>";

echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>Titre</th>
<th>Text</th>
<th>Category</th>
<th>Date</th>

<th>Edite</th>
<th>Delete</th>
</tr>";


while($row=mysqli_fetch_array($result)){
    echo"<tr>";
    echo"<td>".$row['id_page']."</td>";
    echo"<td>".$row['titre']."</td>";
    echo"<td>".$row['text']."</td>";
    echo"<td>".$row['category']."</td>";
    echo"<td>".$row['date']."</td>";

    //display image
    //echo"<td><img src='../data/user_images/".$row['filename']."' alt='$row[username]' width='50'></td>";

    //for edit and delete data
    echo"<td><a href='page_update.php?id=$row[id_page]'/>Edit</a></td>";
    echo"<td><a href='page_delete.php?id=$row[id_page]'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='page_create.php'>Insert a new record</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>
<html>-->
    <!--
    <head>
        <title>insert new data</title>
    </head>
    <body>
        <div><a class="a-body" href="user_create.php">insert a new record</a></div>
    </body>
</html>-->
