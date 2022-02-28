<?php

session_start();

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, 'qtt', FILTER_VALIDATE_INT);
    if ($name && $price && $qtt) {
        $product = [
            'name' => $name,
            'price' => $price,
            'qtt' => $qtt,
            'total' => $price * $qtt,
        ];
        $_SESSION['products'][] = $product;
        $_SESSION['message'] = 'Ajouter avec succès';
        header('Location: index.php');
    } else {
        $_SESSION['message'] = 'Erreur';
    }
}
header('Location: index.php');
