<!DOCTYPE html>
<html>
<head>
  
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  
</head>
<body>

<script type="text/javascript" src="bootstrap.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">BuyIt</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeArticle.php">List des article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addArticle.php">Ajouter article</a>
      </li>
        
    </ul>
 

    <form class="form-inline my-2 my-lg-0" action="home.php" method="post">
    
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
  </div>

</nav>



  <?php

  include("functions.php"); 


  if(isset($_GET["id"]))
  {
    $id=$_GET["id"];
    $datas = getArticleById($id, bdd());
  }
  ?>
  <div class="form-group ">
    <input type="hidden"   value="">
    <label>Libelle:</label>
    <input type="text" id="libelle"  value="<?php echo $datas['libelle']; ?>" class="form-control">
    <small  class="form-text text-muted">Modifier le libelle pour votre article ! </small>
  
  </div>
  <div class="form-group ">
    <label>Description:</label>
    <input type="text" id="description"  value="<?php echo $datas['description']; ?>" class="form-control" >
    <small  class="form-text text-muted">Modifier la description de votre article  </small>
  
</div>
 
  <div class="form-group">
    <label>Prix:</label>
    <input type="text" id="prix"  value="<?php echo $datas['prix']; ?>" class="form-control" >
    <small  class="form-text text-muted">Modifier le prix de votre article  </small>
  </div>

  <button type="submit" name ="submit" onclick="modifier()" class="btn btn-primary">Modifierl'article </button>

</body>

<script>
  function modifier()//une fonction modifier pour modifier un article 
  {
    let id = <?php echo $_GET["id"];?>; //var de fct recoit la val id envoyer par la meth get dans la fct getnote
    let lib = $("#libelle").val();//#var sont les vars recuperer par id des  les inputs 
    let des = $("#description").val();
    let prix = $("#prix").val();

    $.ajax( //fct ajax 
    {
      type:'post',//meth post 
      data:
      {
        id:id,
        lib:lib,
        des:des,
        prix:prix
      },
      url: 'modif.php',//rediriger vers la page modif.php pour l'appel de fct ModifierArticle
      success:function(result)
      {
          Swal.fire( //framework pour afficher une alerte illustrer 
            'Article Modifié',//argument text1  
            'la modification a été effectuée avec succès',//argument big text
            'success'//type de resultat
          ).then(function(){//fonction pour rediriger la page vers la liste des  articles apres l'ajout avec succés
            
            location.href="listeArticle.php";
          
          })
          
      }
    });
  }

</script>
</html>