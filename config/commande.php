<?php 
   
 // ajouter des produits a la b-d
  function ajouter($nom, $image, $prix, $desc)
  {
     
      if(require ("connexion.php")) {
     
           $req = $access->prepare("INSERT INTO produit (nom, image, prix, description) VALUES ('$nom', '$image', $prix, '$desc')");
          $req->execute(array($nom,$image,$prix,$desc));
         $req->closeCursor();  
      }
  }
 
 // afficher les articles

 function afficher()
 {
    if(require("connexion.php")) {
        $req=$access->prepare("SELECT * FROM produit ORDER BY id DESC");
        $req ->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();

    
    }
 }

// supprimer un produit 

function supprimer($id){
    if(require("connexion.php")){
        $req=$access("DELETE * FROM produit  where id=?");
        $rep->execute(array($id));
    }
}
?>