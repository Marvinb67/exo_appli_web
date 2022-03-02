<?php

session_start();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
                $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
                $img = filter_input(INPUT_POST, 'images', FILTER_SANITIZE_URL);

                if (!empty($_FILES['file'])) {
                    $path = 'upload/';
                    $path = $path.basename($_FILES['file']['name']);

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                        $_SESSION['success'] = 'Fichier GOOD';
                    } else {
                        $_SESSION['error'] = 'Pas GOOD';
                    }
                }
                $file = $_FILES['file']['name'];

                if ($name && $price && $qtt && $description && $file) {
                    $product = [
                        'name' => $name,
                        'price' => $price,
                        'qtt' => $qtt,
                        'total' => $price * $qtt,
                        'description' => $description,
                        'images' => $img,
                        'file' => $file,
                    ];
                    $_SESSION['products'][] = $product;
                    $_SESSION['success'] = 'Ajouté avec succès';
                    $_SESSION['error'] = '';
                } elseif (empty($name)) {
                    $_SESSION['error'] = 'Veuillez entrez le nom du produit';
                } elseif (empty($price)) {
                    $_SESSION['error'] = 'Veuillez entrez le prix du produit';
                } elseif (empty($qtt)) {
                    $_SESSION['error'] = 'Veuillez entrez la quantité';
                } elseif (empty($description)) {
                    $_SESSION['error'] = 'Veuillez entrez la description du produit';
                } elseif (empty($file)) {
                    $_SESSION['error'] = 'Veuillez ajoutez un fichier';
                }
                header('Location: index.php');
            }
        break;
        case 'delete':
            if (isset($_GET['id']) && $_SESSION['products'][$_GET['id']]) {
                unset($_SESSION['products'][$_GET['id']]);
                header('Location: recap.php');
            }
        break;
        case 'reset':
            if (isset($_SESSION['products'][$_GET['id']])) {
                unset($_SESSION['products']);
                header('Location: recap.php');
            }
        break;
        case 'up':
           if (isset($_GET['id']) && $_SESSION['products'][$_GET['id']]) {
               ++$_SESSION['products'][$_GET['id']]['qtt'];
               $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
               header('Location: recap.php');
           }
        break;
        case 'down':
        if ($_SESSION['products'][$_GET['id']]['qtt'] < 1) {
            unset($_SESSION['products'][$_GET['id']]);

            header('Location: recap.php');
        } else {
            if (isset($_SESSION['products'][$_GET['id']]) && $_SESSION['products'][$_GET['id']]) {
                --$_SESSION['products'][$_GET['id']]['qtt'];
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];

                header('Location: recap.php');
            }
        }
        break;
        // case "detail":
        //     if(isset($_SESSION['products'][$_GET['id']])){
        //         header('Location: description.php?id='.$_GET["id"]);
        //     }
    }
} else {
    header('Location: index.php');
}
