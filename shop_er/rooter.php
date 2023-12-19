session_start();

    if (!isset($_SESSION['dhdTbzzoP5654'])){
        header("Location : ../login.php");
    }
    if (!empty($_SESSION['dhdTbzzoP5654'])){
        header("Location : ../login.php");
    }
    require("../config/commandes.php");



    function ajouter($image, $nom, $prix, $desc){
    if(require("connexion.php")){
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES('$image','$nom',$prix,'$desc') ");
        $req->execute(array($image,$nom,$prix,$desc));
        $req->closeCursor();
    }
}