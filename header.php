<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <a href="index.php">Ajouter un produits</a>
                <a href="recap.php">Récapitulatif des produits</a>
                <p> <?php
                       if (isset($_SESSION['products'])) {
                           $nbProduits = count($_SESSION['products']);
                           echo ''.$nbProduits.' produits dans dans le panier';
                       } else {
                           echo 'Aucun produits dans le panier';
                       }
                    ?>
                </p>
            </nav>   
        </header>