<?php
    session_start();
    include 'Config.php';
    include 'funktionen.php';

    echo loeschbuttonausfuehren($config);
?>

<br>

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
            <h1>- Home -</h1>
            <?php echo welcomemessage(); ?>
            <form method="post">
                <button type="submit" name="loeschbutton">Account dauerhaft löschen</button>
            </form>

            <b>Aktuelles Guthaben:</b>
            <?php echo guthabenabfrage($config); ?>
            <p><a href="einzahlen.php">Einzahlung</a></p>
            <p><a href="auszahlen.php">Auszahlung</a></p>
            <p><a href="dashboard.php">Dashboard</a></p>
            <p><a href="ueberweisung.php">Ueberweisung</a></p>
            <p><a href="transaktionshistorie.php">Transaktionshistorie</a></p>
            <br>
            <p><a href="logout.php">Logout</a></p>
        </div>
</body>

</html>