<?php
session_start();
    $title = 'Ajouter un produit';
    require 'header.php';
?>
        <?php
            if (isset($_SESSION['message'])) { ?>
                <div id="message" class="bg-success mt-3 text-center"><?= $_SESSION['message']; ?></div>
        <?php
                unset($_SESSION['message']);
                }
        ?>
    <form action="traitement.php?action=add" method="post" class="my-3">
        <p>
            <label>
               <p> Nom du produit :</p>
                <input type="text" name="name" class="form-control">
            </label>
        </p>
        <p>
            <label>
                <p>Prix du produit :</p>
                <input type="number" step="any" name="price" class="form-control">
            </label>
        </p>
        <p>
            <label>
                <p>Quantité désirée :</p>
                <input type="number" name="qtt" value="1" class="form-control">
            </label>
        </p>
        <p>
            <label>
               <p>Déscription :</p>
                <textarea class="form-control" name="description"></textarea>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter un produit" class="form-control bg-primary button">
        </p>
    </form>
<?php
require 'footer.php';
?>