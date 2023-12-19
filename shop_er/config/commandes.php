<?php
function getAdim($email,$motdepasse){
    require("connexion.php");
    if(isset($access)){
        $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");
        $req->execute(array($email,$motdepasse));
        $data = $req->fetch();
        return $data;
        $req->closeCursor();
    }
}
function ajouter($image, $nom, $prix, $desc){
    require("connexion.php"); // Assurez-vous que la connexion est établie correctement
 
    // Vérifiez si la connexion a réussi avant de poursuivre
    if(isset($access)) {
        // Requête préparée avec des paramètres liés
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES(:image, :nom, :prix, :description)");
        // Liaison des valeurs avec les paramètres
        $req->bindParam(':image', $image);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prix', $prix);
        $req->bindParam(':description', $desc);
        // Exécution de la requête
        $req->execute();
        $req->closeCursor();
    } else {
        // Gérer l'erreur de connexion
        echo "Erreur de connexion à la base de données.";
    }
}


function afficher(){
    if (require("connexion.php")){
        $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function supprimer($id) {
    require("connexion.php");
    
    if (isset($access)) {
        try {
            $req = $access->prepare("DELETE FROM produits WHERE id=? ");
            $req->execute(array($id));
            $req->closeCursor();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            // Handle the error
        }
    } else {
        // Gérer l'erreur de connexion
        echo "Erreur de connexion à la base de données.";
    }
}

?>