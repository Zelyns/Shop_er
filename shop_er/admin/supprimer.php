<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();

    if (!isset($_SESSION['dhdTbzzoP5654'])) {
        header("Location: ../login.php");
        exit();
    }
    
    if (empty($_SESSION['dhdTbzzoP5654'])) {
        header("Location: ../login.php");
        exit(); 
    }
    require("../config/commandes.php");
       
    $Produits=afficher();
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
    <a class="navbar-brand" href="#">Shop_er</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Nouveau Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="supprimer.php" style="btn btn-primary">Supprimer</a>
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
    
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Identifiant du produit </label>
                <input type="number" class="form-control" name="idproduit" require>
            </div>

            <button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button>
            </form>  


        </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="album py-5 bg-body-tertiary">
                    <div class="container">

                    

                        <?php foreach($Produits as $produit): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                
                                
                            <img src="<?= $produit->image ?>" width="420" height="250">
                            <div class="d-flex justify-content-between align-items-center">
                            
                            <br>
                            <h3><?= $produit->id ?></h3>
                          </div>
                               
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>    
                </div>            
            </div>

    </div>
</div>


</body>
</html>

<?php

if(isset($_POST['valider']))
{
  if(isset($_POST['idproduit']))
  {
  if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit']))
      {
          $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

        try 
        {
          supprimer($idproduit);
          
        } 
        catch (Exception $e) 
        {
            $e->getMessage();
        }
          


      }
  }
}

?>