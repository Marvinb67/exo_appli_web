<?php

session_start();

if(isset($_GET["action"])){

    switch($_GET["action"]) {
        case "add":
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
                $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
                
                if ($name && $price && $qtt && $description) {
                    $product = [
                        'name' => $name,
                        'price' => $price,
                        'qtt' => $qtt,
                        'total' => $price * $qtt,
                        'description' => $description
                    ];
                    $_SESSION['products'][] = $product;
                    $_SESSION['message'] = 'Ajouté avec succès';
                    header('Location: index.php');
                } else {
                    $_SESSION['message'] = 'Erreur';
                }
            }
        case "delete":
            if(isset($_GET['id']) && $_SESSION['products'][$_GET['id']]){
                unset($_SESSION['products'][$_GET['id']]);
                header('Location: recap.php');
            }
        break;
        case "reset":
            if(isset($_SESSION['products'][$_GET['id']])){
                unset($_SESSION['products']);
                header('Location: recap.php');
            }
        break;
        case "up":
           if(isset($_GET['id']) && $_SESSION['products'][$_GET['id']]){
            $_SESSION['products'][$_GET['id']]['qtt']++;
            $_SESSION['products'][$_GET['id']]['total'] =  $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
            header('Location: recap.php');
        }
        break;
        case "down":
        if(isset($_SESSION['products'][$_GET['id']])){
            $_SESSION['products'][$_GET['id']]['qtt']--;
            $_SESSION['products'][$_GET['id']]['total'] =  $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];

            header('Location: recap.php');
        }
        break;
        case "detail":
            if(isset($_SESSION['products'][$_GET['id']])){
                header('Location: description.php?id='.$_GET["id"]);
            }
    }
}else{
    header('Location: index.php');
}
