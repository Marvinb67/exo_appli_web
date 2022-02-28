<?php
    session_start();
    $title = 'Récapitulatif';
    require 'header.php';
?>
    <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo '<p>Aucun produit en session...';
        } else {
            echo '<table>',
                    '<thead>',
                        '<tr>',
                            '<th>#</th>',
                            '<th>Nom</th>',
                            '<th>Prix</th>',
                            '<th>Quantité</th>',
                            '<th>Total</th>',
                        '</tr>',
                    '</thead>',
                    '<tbody>';
            $totalGeneral = 0;
            foreach ($_SESSION['products'] as $index => $product) {
                echo '<tr>',
                        '<td>'.$index.'</td>',
                        '<td>'.$product['name'].'</td>',
                        '<td>'.number_format($product['price'], 2, ',', '&nbsp;€').'</td>',
                        '<td>'.$product['qtt'].'</td>',
                        '<td>'.number_format($product['total'], 2, ',', '&nbsp;€').'</td>',
                    '</tr>';
                $totalGeneral += $product['total'];
            }
            echo  '<tr>',
                    '<td colspan=4> Total Général : </td>',
                    '<td><strong>'.number_format($totalGeneral, 2, ',', '&nbsp;').'&nbsp;€</strong></td>',
                  '</tr',
                '</tbody>';
        }
        require 'footer.php';
    ?>