<?php
include('header_admin.php');
include("../entity/article_image_entity.php");

$message = "";
$article_image = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (ArticleImageEntity::delete($id))
            $message = "Article image ".$id." supprimé avec succès";
        else
            $message = "L'article image ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$article_images = new ArticleImageEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Article Images</h1>";
echo "<p>".$message."</p>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo"<table class='admin-table-read'>
<tr>
<th>ID</th>
<th>ID Article</th>
<th>type</th>
<th>Filename</th>
<th>Filename preview</th>

<th>Edit</th>
<th>Delete</th>
</tr>";
foreach ($article_images->getArticleImages() as $article_image){
    echo"<tr>";
    echo"<td>".$article_image->id."</td>";
    echo"<td>".$article_image->id_article."</td>";
    echo"<td>".$article_image->type."</td>";
    echo"<td>".$article_image->filename."</td>";
    //display image
    echo"<td><img src='../data/article_images/".$article_image->filename ."' alt='$article_image->filename' width='50'></td>";
    //for edit and delete data
    echo"<td><a href='article_image_createorupdate.php?action=update&id=$article_image->id'/>Edit</a></td>";
    //echo"<td><a href='user_delete.php?id=$user->id'/>Delete</a></td>";
    echo"<td><a href='article_image_readdelete.php?action=delete&id=$article_image->id'/>Delete</a></td>";
    echo"</tr>";
}
echo"</table>";
echo "</div>";

echo "<div class='flexbox-item'>";
echo "<a class='a-body' href='article_image_createorupdate.php?action=create'>Create a new article image</a>";
echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";

?>
