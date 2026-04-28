<?php
session_start();
require_once __DIR__ . '/../src/funktionen.php';
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../templates/head.php'; ?>

<body>
    <?php require_once __DIR__ . '/../templates/header.php'; ?>
    <h1 class="ueberschrift-zentriert">404 - ERROR!</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <h3>Diese Seite existiert nicht.</h3>
            <?php echo linkanzeigen(); ?>
        </div>
    </div>
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>