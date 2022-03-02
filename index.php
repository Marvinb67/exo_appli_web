<?php
session_start();
echo $_SERVER['DOCUMENT_ROOT'];
    $title = 'Ajouter un produit';
    require 'header.php';
?>
        <?php
            if (isset($_SESSION['success'])) { ?>
                <div id="message"><?= $_SESSION['success']; ?></div>
        <?php
                unset($_SESSION['success']);
                } elseif (isset($_SESSION['error'])) {
                    echo "<div id='error'> ".$_SESSION['error'].' </div>';

                    unset($_SESSION['error']);
                }
        ?>
    <form action="traitement.php?action=add" method="post" enctype="multipart/form-data">
        <p>
            <label>
               <p class="form-label"> Nom du produit :</p>
                <input type="text" name="name" class="form-input">
            </label>
        </p>
        <p>
            <label>
                <p class="form-label">Prix du produit :</p>
                <input type="number" step="any" name="price" class="form-input">
            </label>
        </p>
        <p>
            <label>
                <p class="form-label">Quantité désirée :</p>
                <input type="number" name="qtt" value="1" class="form-input">
            </label>
        </p>
        <p>
            <label>
               <p class="form-label">Description :</p>
                <textarea class="form-input area" name="description"></textarea>
            </label>
        </p>
        <p>
            <label for="images">
                <p class="form-label">Image</p>
                <input type="url" name="images" class="form-input" placeholder="Ajouter une image">
            </label>
        </p>
        <p>
            <label for="file">
                <p class="form-label">File</p>
                <input type="file" name="file" class="form-input" accept="image/*">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter un produit" class="button">
        </p>
    </form>
<?php
require 'footer.php';

?>