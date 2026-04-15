<?php
    include 'Config.php';
    include 'funktionen.php';

    echo einloggen($config);
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
            <h1>- Login -</h1>
            <form action="" method="POST">
                <label for="">Email eingeben:</label><br>
                <input type="email" name="email" placeholder="email" required=""><br><br>
                <input type="password" name="passwordeingabe" placeholder="password" required=""><br><br>
                <input type="submit" name="login_btn" value="login"><br><br>
            </form>
            <p><a href="index.php">zur Hauptseite</a></p>
        </div>
</body>

</html>