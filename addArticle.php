<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script type = "text/javascript" src="js/jquery-3.4.1.min.map"></script> 
  
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

<form method="post" action="addArticle.php">
  <?php
      include("functions.php");

      if(isset($_POST['submit']))
       {
          $libelle      = htmlentities(trim($_POST['libelle']));
          $description  = htmlentities(trim($_POST['description']));
          $prix         = htmlentities(trim($_POST['prix']));
          if($libelle && $description && $prix )
          {
            
            $bdd=bdd();
            addArticle($_POST,$bdd);
            header("Location:listeArticle.php");
          }

        }


  ?>
  
  <div class="form-group ">
    <label>Libelle:</label>
    <input type="text"  name="libelle" class="form-control">
    <small  class="form-text text-muted">Ajouter un libelle pour votre article ! </small>
  
  </div>
  <div class="form-group ">
    <label>Description:</label>
    <input type="text" name="description" class="form-control" >
    <small  class="form-text text-muted">Petite description a votre article  </small>
  
</div>
 
  <div class="form-group">
    <label>Prix:</label>
    <input type="text" name="prix" class="form-control" >
    <small  class="form-text text-muted">Donner un prix a votre article  </small>
  </div>

  <button type="submit" name ="submit" class="btn btn-primary">Ajouter l'article</button>
</form>
</body>
</html>