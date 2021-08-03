<?php 
    require("../config/connexion.php");
    require("../config/commande.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Titre de l'image </label>
    <input type="name" class="form-control" id="exampleInputEmail1"  name="nom" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="text" class="form-control" name="image" required >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description</label>
    <textarea  class="form-control" name="desc" required > </textarea>
  </div>
  
  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>
</div>
</div>
</body>
</html>

<?php 
 if(isset($_POST['valider'])){
     if(isset($_POST['nom']) AND isset($_POST['image']) AND isset($_POST['prix']) AND isset($_POST['desc']))
     {
        if(!empty($_POST['nom']) AND !empty($_POST['image']) AND !empty($_POST['prix']) AND !empty($_POST['desc'])) {
            $image = htmlspecialchars(strip_tags($_POST['nom']));
            $nom = htmlspecialchars(strip_tags($_POST['image']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));

            try{
            ajouter($nom,$image,$prix,$desc);

            } catch(Exception $e) {
                $e->getMessage();
            }

            
        }
     }
 }
?>