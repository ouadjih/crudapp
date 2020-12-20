
<?php
		function bdd()
		{
			try
			{
				$pdo_options[PDO :: ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host=localhost;dbname=article','root','');
			

			}
			catch(PDOException $e)
			{
				die("ERR : ".$e->getMessage());
			}
			return $bdd;
			
		}


		//$stmt = $dbh->prepare('some query here');
        //$stmt->execute();

		function DeleteArticle($db,$id)
		{
				$query= $db->prepare("DELETE FROM `jouets` WHERE id= $id");
				$query->execute();


		}


		function ModifieArticle($db)
		{

			if(isset($_REQUEST['id']) && isset($_REQUEST['lib']) && isset($_REQUEST['des']) && isset($_REQUEST['prix']))
			{
				$libelle	 = 	$_REQUEST['lib'];
				$prix	 	 = 	$_REQUEST['prix'];
				$description	 = 	$_REQUEST['des']; 	
	      		$id  		 =  $_REQUEST['id'];//sauvgarder la valeur ID d'article dans une variable pui on l'envoyer avec le lien

				$query = "UPDATE `jouets` SET `libelle`='$libelle',`prix`='$prix',`description`='$description' WHERE `id`='$id' ";
				$db->exec($query);
				
			}
		}



		function getArticles($db)
		{
		//on creé larequete sql
			$sql ='SELECT * from jouets';
			$r= $db->query($sql);

		
			while($donnees = $r->fetch())
  			{
  				
    			echo"<tr>";
      			echo"<th scope='row'>".htmlspecialchars($donnees['id'])."</th>";
      			echo"<td>".htmlspecialchars($donnees['libelle'])."</td>";
      			echo"<td>".htmlspecialchars($donnees['description']) ."</td>";
      			echo"<td>". htmlspecialchars($donnees['prix']) ."</td>";
      			$id=$donnees['id'];//sauvgarder la valeur ID d'article dans une variable pui on l'envoyer avec le lien
      			echo"<td><a href='delete.php?id=$id' onclick='return confirm(\"Etes vous sure  de Supprimer?\");'
      			class='fas fa-trash-alt' class='trash'><a>    
       
		 		<a href='Modifier.php?id=$id'class='far fa-edit' class='trash'></a>
				</form></td>";
				echo"</tr>";
    		
  			} ;
		}

		function getArticleById($id, $db)
		{
			$sql = "SELECT * from jouets WHERE id='$id'";

			$r= $db->query($sql);

			if($row = $r->fetch())
			{
				return $row;
			}
			else
			{
				echo "Not found";
			}
		}
	
		function addArticle($T,$db)
		{
		//on creé larequete sql
			$query ="INSERT INTO `jouets`(`id`, `libelle`, `prix`, `description`, `actif`) VALUES ('','".$T['libelle']."','".$T['prix']."','".$T['description']."','yes')";

			$res= $db->exec($query) or die('Erreur SQL !<br>'.$query.'<br>'.$db->errorInfo());
			return $res;
		}	
	
?>