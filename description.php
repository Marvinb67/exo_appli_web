<?php
session_start();

$title = 'Description produit';
require 'header.php';

if (!isset($_GET['id']) && !isset($_SESSION['products'][$_GET['id']])) {
    $_SESSION['error'][0] = '<p>Erreur produit introuvable</p>';
    header('Location:recap.php');
}
$product = $_SESSION['products'][$_GET['id']];
?>
<div id="description">
    
    <img src="upload/<?= $product['file']; ?>" alt="file-image">
    <div>
        <h1><?= $product['name']; ?></h1>
        <p>Prix : <?= $product['price']; ?> €</p>
        <p>Description :</p>
        <p><?= $product['description']; ?></p>
        <div>
            
            <?php var_dump($_FILES); ?>













    <!-- // if(isset($_SESSION['products'][$_GET['id']])){    
    //         echo "<div class='card'>",
    //                 "<div class='card-body'>",
    //                     "<h1 class='card-title'> ". $_SESSION['products'][$_GET['id']]['name'] ." </h1>",
                        
    //                     "<p class='card-text'> Prix : ". $_SESSION['products'][$_GET['id']]['price'] ." €</p>",
            
    //                     "<p class='card-text'>Description : </p>",
    //                     "<p class='card-text'> ". $_SESSION['products'][$_GET['id']]['description'] ." </p>",
    //              "</div>";
    //     } -->