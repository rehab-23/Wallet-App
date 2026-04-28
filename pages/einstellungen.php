<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/funktionen.php';
echo loeschbuttonausfuehren($conn);
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/../templates/head.php'; ?>

<body>
    <?php require_once __DIR__ . '/../templates/header.php'; ?>
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
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>