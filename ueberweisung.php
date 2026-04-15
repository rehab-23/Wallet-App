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
            <h1>- Überweisung -</h1>
            <form action="" method="POST">
                <p><label for="">Überweisungsformular ausfüllen:</label><br></p>
                <p><input type="username" name="name" placeholder="username empfaenger" required=""></p>
                <p><input type="number" name="betrag" placeholder="betrag" step="0.01" min="0.01" required=""></p>
                <p><input type="text" name="verwendungszweck" placeholder="verwendungszweck" required=""></p>
                <p><input type="submit" name="senden_btn" value="senden"></p>
            </form>
            <?php echo ueberweisungausfuehren($config); ?>
            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>