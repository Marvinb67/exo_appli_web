<?php
session_start();
    $title = 'Ajouter un produits';
    require 'header.php';
?>
        <?php
            if (isset($_SESSION['message'])) { ?>
                <div id="message"><?= $_SESSION['message']; ?></div>
        <?php
                unset($_SESSION['message']);
                }
        ?>
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée :
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter un produit">
        </p>
    </form>
<?php
require 'footer.php';
?>