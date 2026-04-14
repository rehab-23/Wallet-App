<?php
    session_start();

    function linkanzeigen() {
        if(isset($_SESSION['username'])) {
            return '<a href="home.php">zurück</a><br>';
        } else {
            return 'Session nicht gestartet... <br><a href="index.php">zur Hauptseite</a><br>';
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet-App</title>
</head>

<body>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>404 - ERROR!</h1>
            <h3>Diese Seite existiert nicht.</h3>
            <?php echo linkanzeigen(); ?>
        </div>
</body>

</html>