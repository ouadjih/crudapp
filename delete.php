<?php
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	if(!empty($id )&& is_numeric($id))
	{
		include("functions.php");
		
		DeleteArticle(bdd(),$id);
		header("Location:listeArticle.php");
	}
}
?>