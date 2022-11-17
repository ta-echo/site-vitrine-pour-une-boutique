<?php
include('header_admin.php');
include("../entity/article_entity.php");

$message = "";
$articles = "";

if ($_GET && isset($_GET['action']))
{
    if ($_GET['action'] == "delete" && isset($_GET['id']))
    {
        $id = $_GET['id'];
        if (ArticleEntity::delete($id))
            $message = "Article ".$id." supprimé avec succès";
        else
            $message = "L'article ".$id." n'a pas pu être supprimé ou bien n'existe pas.";
    }
}

$articles = new ArticleEntityList(true);

echo "<div class='flexbox-container'>";
echo "<div class='flexbox-item'>";
echo "<h1>Manage : Articles</h1>";
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

foreach ($articles->getArticles() as $article){
    echo"<tr>";
    echo"<td>".$article->id."</td>";
    echo"<td>".$article->titre."</td>";
    echo"<td>".$article->text."</td>";
    echo"<td>".$article->category."</td>";
    echo"<td>".$article->date."</td>";
  
    echo"<td><a href='article_createorupdate.php?action=update&id=$article->id'/>Edit</a></td>";

    echo"<td><a href='article_readdelete.php?action=delete&id=$article->id'/>Delete</a></td>";

    echo"</tr>";
}
echo"</table>";
echo "</div>";


echo "<div class='flexbox-item'>";

echo "<a class='a-body' href='article_createorupdate.php?action=create'>Create a new article</a>";

echo "</div>";

echo "</div>";

echo "<br>";
echo "<br>";
?>
