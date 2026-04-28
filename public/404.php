<?php
session_start();
include 'funktionen.php';
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <h1 class="ueberschrift-zentriert">404 - ERROR!</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <h3>Diese Seite existiert nicht.</h3>
            <?php echo linkanzeigen(); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>