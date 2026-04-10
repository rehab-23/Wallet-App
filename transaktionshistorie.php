<?php          
    include 'Config.php';
    session_start();
    $username_sender_session= $_SESSION['username'];

    //einfach Abfrage aller Transaktionen, wo aktueller User Sender o. Empfänger ist
    $sql= "SELECT * FROM transaktionen WHERE username_sender = '$username_sender_session' OR username_empfaenger = '$username_sender_session'";
    $result= mysqli_query($config, $sql);

    //Daten aus Array $result auslesen, als mysqli_result-Objekt
    //while‑Schleife läuft so oft, wie die SQL‑Abfrage Zeilen zurückliefert
    // Prüfen, ob es Ergebnisse gibt

    $html_output= "";
    if (mysqli_num_rows($result) > 0) {

        $html_output .= "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; margin-top:20px;'>
                <tr style='background:#f0f0f0;'>
                    <th>transaktion_id</th>
                    <th>username_sender</th>
                    <th>username_empfaenger</th>
                    <th>betrag</th>
                    <th>datum</th>
                    <th>verwendungszweck</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {

            $html_output .= "<tr>
            <td>{$row['transaktion_id']}</td>
            <td>{$row['username_sender']}</td>
            <td>{$row['username_empfaenger']}</td>
            <td>{$row['betrag']}</td>
            <td>{$row['datum']}</td>
            <td>{$row['verwendungszweck']}</td>
            </tr>";
        }

        $html_output .= "</table>";

    } else {
        $html_output .= "<p>Keine Transaktionen gefunden</p>";
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
            <h1>- Transaktionshistorie -</h1>

            <form action="" method="POST">
                <div id="transaktionshistorie">
                    <?php 
                        echo $html_output;     
                    ?>
                </div>
            </form>

            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>