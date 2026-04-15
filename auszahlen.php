<?php
    session_start();
    include 'Config.php';
    include 'funktionen.php';
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
            <h1>- Auszahlen -</h1>
            <form action="" method="POST">
                <p><input type="number" name="betrag" placeholder="betrag" step="0.01" min="0.01" required=""></p>
                <p><input type="submit" name="ausfuehren_btn" value="ausführen"></p>
            </form>
            <?php echo auszahlung($config); ?>
            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>