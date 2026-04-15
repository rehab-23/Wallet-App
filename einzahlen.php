<?php
    include 'Config.php';
    session_start();

    function einzahlung($config) {
        if (isset($_POST['ausfuehren_btn'])) {
            $username = $_SESSION['username'];
            $betrag = $_POST['betrag'];
            //Username vergleichen aus Session
            //Abfrage um Wert von Guthaben für Verrechnung zu haben
            //als Variable + neuen Einzahl-Betrag addieren
            $sql = "SELECT guthaben FROM users WHERE username = '$username'";
            $result = mysqli_query($config, $sql);

            $row = mysqli_num_rows($result);

            //ggf. Fehlermeldung ausgeben
            if (!$result) {
                die("SQL-Fehler: " . mysqli_error($config));
            }

            if ($row == 1) {
                $fetch = mysqli_fetch_assoc($result);
                $guthaben_alt = $fetch['guthaben'];
                $guthaben_neu = $guthaben_alt + $betrag;
                $sql = "UPDATE users SET guthaben='$guthaben_neu' WHERE username='$username'";
                $result = mysqli_query($config, $sql);
                return "<br>Einzahlung erfolgreich";
            } else {
                return "<br>!ERROR - Benutzer nicht gefunden";
            }
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
            <h1>- Einzahlen -</h1>
            <form action="" method="POST">
                <p><input type="number" name="betrag" placeholder="betrag" step="0.01" min="0.01" required=""></p>
                <p><input type="submit" name="ausfuehren_btn" value="ausführen"></p>
            </form>
            <?php echo einzahlung($config); ?>
            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>