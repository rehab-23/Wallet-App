<?php
session_start();
include 'Config.php';
include 'funktionen.php';
echo loeschbuttonausfuehren($conn);
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <h1 class="ueberschrift-zentriert">- Einstellungen -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <form method="post">
                <button type="submit" class="btn btn-danger" name="loeschbutton">Account dauerhaft löschen</button>
            </form>
            <br><br>
            <?php echo buttonblau("home.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>