<?php
require_once "database.php";

$sql = "SELECT * FROM `inventaires`;";
$inventaireStatement = $db->prepare($sql);
$inventaireStatement->execute();
$inventaires = $inventaireStatement->fetchAll();

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mon Inventaire</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="inventaire.css">
</head>
  <body>
        <div class="header_top">
            <header class="nomSite">
                <h1>VAP FACTORY</h1>
            </header>

            <div class="titreTab">
                <h2>INVENTAIRE</h2>
            </div>
        </div>
        
        <div class="backTab">
            <div class="frontTab">
                
                <table class="table table-striped table-hover">
                    <thead>
                <tr class="headerTab">
                    <th>#</th>
                    <th>Référence</th>
                    <th>Nom de l'article</th>
                    <th>Description de l'article</th>
                    <th>Prix d'achat unitaire</th>
                    <th>Prix de vente unitaire</th>
                    <th>Quantité de stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($inventaires as $inventaire): ?>
                    <tr>
                        <td><?= $inventaire['id'] ?></td>
                        <td><?= ucwords($inventaire['reference']) ?></td>
                        <td><?= ucwords($inventaire['nomArticle']) ?></td>
                        <td class="descript-column"><?= ucwords($inventaire['description']) ?></td>
                        <td><?= ($inventaire['prixAchat']) ?></td>
                        <td><?= $inventaire['prixVente'] ?></td>
                        <td><?= $inventaire['stock'] ?></td>
                        <td class="options-btn">

                        <a href="create.php?id=<?= $inventaire['id'] ?>" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square"></i> Modifier</a>
                        <a href="delete.php?id=<?= $inventaire['id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Supprimer</a>
                        
                        </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary add-btn"><i class="fa-regular fa-plus"></i> Ajouter un article</a>
        
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>