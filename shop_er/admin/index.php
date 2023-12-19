<?php
session_start();

    if (!isset($_SESSION['dhdTbzzoP5654'])) {
        
        header("Location: ../login.php");
        
    }
    
    if (empty($_SESSION['dhdTbzzoP5654'])) {
        
        header("Location: ../login.php");
        
    }
    require("../config/commandes.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">Shop_er</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="btn btn-primary">Nouveau Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Supprimer</a>
        </li>
      </ul>
      <div style="display: flex; justify-content: flex-end;">
        <a href="deconnexion.php" class="btn btn-primary">Deconnexion</a>
      </div>
    </div>
  </div>
</nav>
    
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
    <input type="name" class="form-control" name="image" require>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom" require>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prix</label>
    <input type="string" class="form-control" name="prix" require>
    </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Desciption</label>
    <textarea class="form-control" name="desc" required></textarea>
    </div>

  <button type="submit" name="valider" class="btn btn-primary">Ajouter produit</button>
    </form>  

</div></div></div>


</body>
</html>

<?php

if(isset($_POST['valider']))
{
  if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
  {
  if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
      {
          $image = htmlspecialchars(strip_tags($_POST['image']));
          
          $nom = htmlspecialchars(strip_tags($_POST['nom']));
          
          $prix = (int)htmlspecialchars(strip_tags($_POST['prix']));
          
          $desc = htmlspecialchars(strip_tags($_POST['desc']));
          
        
        try 
        {
          ajouter($image, $nom, $prix, $desc);
         
        } 
        catch (Exception $e) 
        {
            var_dump($e->getMessage()) ;
        }

      }
  }
}

?>