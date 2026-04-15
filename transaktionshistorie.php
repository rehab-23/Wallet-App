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
            <h1>- Transaktionshistorie -</h1>

            <form action="" method="POST">
                <div id="transaktionshistorie">
                    <?php
                        echo transaktionshistorieanzeigen($config);
                    ?>
                </div>
            </form>

            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>