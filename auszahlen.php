<?php
    session_start();
    include 'Config.php';
    include 'funktionen.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Auszahlen -</h1>
            <form action="" method="POST">
                <p><input type="number" name="betrag" placeholder="betrag" step="0.01" min="0.01" required=""></p>
                <p><input type="submit" name="ausfuehren_btn" value="ausführen"></p>
            </form>
            <?php 
                echo auszahlung($config); 
                echo buttonblau("home.php", "zurück"); 
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>