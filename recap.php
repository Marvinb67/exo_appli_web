<?php
session_start();
$title = 'Récapitulatif';
require 'header.php';
?>
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo '<p>Aucun produit en session...</p>';
    } else {
        echo '<table class = "table mt-5">',
        '<thead>',
            '<tr>',
                '<th>#</th>',
                '<th>Nom</th>',
                '<th>Prix</th>',
                '<th>Quantité</th>',
                '<th>Total</th>',
                '<th>Supprimer</th>',
            '</tr>',
        '</thead>',
        '<tbody>';
        $totalGeneral = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo '<tr>',
                    '<td> '.$index.' </td>',
                    "<td><a href='description.php?id=$index'> $product[name] </a> </td>",
                    '<td>'.number_format($product['price'], 2, ',', '&nbsp;€').'</td>',
                    "<td> $product[qtt] <a href='traitement.php?action=down&id=$index' class='qtt'>-</a>  <a href='traitement.php?action=up&id=$index' class='qtt'>+</a> </td>",
                    '<td>'.number_format($product['total'], 2, ',', '&nbsp;€').'</td>',
                    "<td><a href='traitement.php?action=delete&id=$index' class='delete'>Supprimer</a></td>",
                    '</tr>';
            $totalGeneral += $product['total'];
        }
        echo    '<tr>',
                    '<td colspan=4> Total Général : </td>',
                    '<td><strong>'.number_format($totalGeneral, 2, ',', '&nbsp;').'&nbsp;€</strong></td>',
                    "<td><a href='traitement.php?action=reset&id=$index'class='delete'>Tout supprimer</a></td>",
                '</tr>',
            '</tbody>',
        '</table>';
    }
    require 'footer.php';
