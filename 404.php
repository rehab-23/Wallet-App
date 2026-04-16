<?php
    session_start();
    include 'funktionen.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>404 - ERROR!</h1>
            <h3>Diese Seite existiert nicht.</h3>
            <?php echo linkanzeigen(); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>