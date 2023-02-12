<?php

require_once "database.php";

$id = $_GET['id'] ?? null;

$reference = $_POST['reference'] ?? null;
$nomArticle = $_POST['nomArticle'] ?? null;
$description = $_POST['description'] ?? null;
$prixAchat = $_POST['prixAchat'] ?? null;
$prixVente = $_POST['prixVente'] ?? null;
$stock = $_POST['stock'] ?? null;


if(!empty($reference) && !empty($nomArticle) && !empty($description) && !empty($prixAchat) && !empty($prixVente) && !empty($stock)) {
    if(!empty($id)) {
        $sql = "UPDATE `inventaires` SET `reference` = '$reference', `nomArticle` = '$nomArticle', `description` = '$description', `prixAchat` = '$prixAchat', `prixVente` = '$prixVente', `stock` = '$stock' WHERE `inventaires`.`id` = $id;";
    } else {
        $sql = "INSERT INTO `inventaires` (`id`, `reference`, `nomArticle`, `description`, `prixAchat`, `prixVente`, `stock`) VALUES (NULL, '$reference', '$nomArticle', '$description', '$prixAchat', '$prixVente', '$stock');";
    }
    $inventaireStatement = $db->prepare($sql);
    $inventaireStatement->execute();

    header('Location: inventaire.php');
    exit;
}

if(!empty($id)) {
    $sql = "SELECT * FROM `inventaires` WHERE `inventaires`.`id` = $id;";
    $inventaireStatement = $db->prepare($sql);
    $inventaireStatement->execute();
    $inventaire = $inventaireStatement->fetch();

    $reference = $inventaire['reference'];
    $nomArticle = $inventaire['nomArticle'];
    $description = $inventaire['description'];
    $prixAchat = ($inventaire['prixAchat']);
    $prixVente = $inventaire['prixVente'];
    $stock = $inventaire['stock'];
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= !empty($id) ? "Modifier" : "Ajouter"?> un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
    <main class="container p-5">
        <h1><?= !empty($id) ? "Modifier" : "Ajouter"?> un article</h1>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <label for="reference">Référence</label>
                    <input value="<?= $reference ?>" type="text" class="form-control" placeholder="Référence" name="reference">
                </div>
                <div class="col">
                    <label for="nomArticle">Nom de l'article</label>
                    <input value="<?= $nomArticle ?>" type="text" class="form-control" placeholder="Nom de l'article" name="nomArticle">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description de l'article</label>
                <input value="<?= $description ?>" type="text" class="form-control" id="description" placeholder="Informations" name="description">
            </div>
            <div class="form-group">
                <label for="prixAchat">Prix d'achat unitaire</label>
                <input value="<?= $prixAchat ?>" type="text" class="form-control" id="prixAchat" placeholder="Prix d'achat unitaire" name="prixAchat">
            </div>
            <div class="form-group">
                <label for="prixVente">Prix de vente unitaire</label>
                <input value="<?= $prixVente ?>" type="text" class="form-control" id="prixVente" placeholder="Prix de vente unitaire" name="prixVente">
            </div>
            <div class="form-group">
                <label for="stock">Quantité de stock</label>
                <input value="<?= $stock ?>" type="text" class="form-control" id="stock" placeholder="Quantité de stock" name="stock">
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary w-100"><?= !empty($id) ? "Modifier" : "Ajouter"?></button>
            </div>
        </form>
        <a href="inventaire.php" class="btn btn-link mt-3">retour</a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>