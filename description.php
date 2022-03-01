<?php
session_start();

$title = "Déscription produit";
require "header.php";
    if(isset($_SESSION['products'][$_GET['id']])){    
            echo "<div class='card'>",
                    "<div class='card-body'>",
                        "<h1 class='card-title'> ". $_SESSION['products'][$_GET['id']]['name'] ." </h1>",
                        
                        "<p class='card-text'> Prix : ". $_SESSION['products'][$_GET['id']]['price'] ." €</p>",
            
                        "<p class='card-text'>Description : </p>",
                        "<p class='card-text'> ". $_SESSION['products'][$_GET['id']]['description'] ." </p>",
                 "</div>";
        }