<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    <link rel="stylesheet" href="style.css">
    <title><?= $title; ?></title>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar bg-danger">
                <a href="index.php">Ajouter un produit</a>
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