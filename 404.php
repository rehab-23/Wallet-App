<?php
    session_start();
    include 'funktionen.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<body>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>404 - ERROR!</h1>
            <h3>Diese Seite existiert nicht.</h3>
            <?php echo linkanzeigen(); ?>
        </div>
</body>

</html>