<!DOCTYPE html>
<html>
<head>
	<title>Liste des Articles</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 <link href="C:/Users/Pavilion/Desktop/devweb/fontawesome-free-5.12.1-web/cssicon/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listeArticle.php">List des article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addArticle.php">Ajouter article</a>
      </li>
        
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input name ="search"class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button name="btn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
<h3>liste des article </h1>

  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID <i class="fa-pencil" title="Edit"></i></th>
      <th scope="col">LIBELLE</th>
      <th scope="col">DECRIPTION</th>
      <th scope="col">PRIX</th>
      <th scope="col">EDIT/DELETE 
        
      </th>
    </tr>
  </thead>
  <tbody>
    <form action="listArticle.php" method="post">
    <?php
      
      include("functions.php");
        
            $bdd=bdd();
            //var_dump(getArticles($bdd));//numero d'indice et type de contenue array(ind){[ind]=>contenu "type"?...}
            //echo"<br>";

            print_r(getArticles($bdd));// array([i]=>contenue)
           
          ?>
    </form>        
           

            
            

  


   
  </tbody>
</table>

</body>
</html>
</body>
</html>