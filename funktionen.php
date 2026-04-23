<?php
function welcomemessage()
{
    if (isset($_SESSION['username'])) {
        return "Welcome, " . $_SESSION['username'] . " !";
    } else {
        header('location:login.php');
        exit;
    }
}


function linkanzeigen()
{
    if (isset($_SESSION['username'])) {
        return '<a href="home.php">zurück</a><br>';
    } else {
        return 'Session nicht gestartet... <br><a href="index.php">zur Hauptseite</a><br>';
    }
}


function loeschbuttonausfuehren($conn)
{
    if (isset($_POST['loeschbutton'])) {
        $username = $_SESSION['username'];
        $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE username= ?");

        if (!$stmt) {
            die("Fehler beim Vorbereiten der Abfrage: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        // Prüfen, ob ein Datensatz gelöscht wurde
        //mysqli_stmt_affected_rows liest aus wv. Datensätze betroffen waren
        if (mysqli_stmt_affected_rows($stmt) === 1) {
            return "<br>User erfolgreich gelöscht.";
        } else {
            return "<br>User existiert nicht in der Datenbank.";
        }
    }
}


function buttonblau($seitenlink, $bezeichnung)
{
    return "<p><a class='btn btn-primary' href='$seitenlink'>$bezeichnung</a></p>";
}


function registrieren($conn)
{
    if (isset($_POST['register_btn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $password_wdh = $_POST['password_wdh'];

        //1. kontrolle: email + username prüfen
        $select = "SELECT * FROM users WHERE email= '$email' OR username = '$username'";
        $query = mysqli_query($conn, $select);
        $row = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);

        if ($row == 0) {
            //2. kontrolle: passwort prüfen
            if ($password_wdh == $password) {
                $select = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hashed')";
                $query = mysqli_query($conn, $select);

                if ($query) {
                    header('Location: login.php');
                    exit;
                } else {
                    return "Fehler beim Registrieren: " . mysqli_error($conn);
                }
            } else {
                return "<br>password stimmt nicht überein, Registrierung abgebrochen";
            }
        } else {
            return "<br>email und/oder username bereits registriert, Reg fehlgeschlagen";
        }
    }
}


function einloggen($conn)
{
    if (!isset($_POST['login_btn'])) {
        return;
    }

    $email = $_POST['email'];
    $passwordeingabe = $_POST['passwordeingabe'];

    $stmt = mysqli_prepare($conn, "SELECT username, email, password FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL-Fehler: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) !== 1) {
        return "email und/oder passwort ungültig";
    }

    $fetch = mysqli_fetch_assoc($result);

    if (!password_verify($passwordeingabe, $fetch['password'])) {
        return "email und/oder passwort ungültig";
    }

    session_start();
    $_SESSION['username'] = $fetch['username'];
    header("Location: home.php");
    exit;
}



function guthabenabfrage($conn)
{
    $username = $_SESSION['username'];
    $stmt = mysqli_prepare($conn, "SELECT guthaben FROM users WHERE username = ?");

    if (!$stmt) {
        die("Fehler beim Vorbereiten der Abfrage: " . mysqli_error($conn));
    }

    //parameter binden
    mysqli_stmt_bind_param($stmt, "s", $username);
    //abfrage ausführen
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['guthaben'];
    }

    return "<br>!ERROR - Guthaben nicht gefunden";
}


function einzahlung($conn)
{
    if (!isset($_POST['ausfuehren_btn'])) {
        return;
    }

    $username = $_SESSION['username'];
    $betrag = floatval($_POST['betrag']);

    //Guthaben abrufen
    $stmt = mysqli_prepare($conn, "SELECT guthaben FROM users WHERE username = ?");
    if (!$stmt) {
        die("SQL-Fehler: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) !== 1) {
        return "<br>!ERROR - Benutzer nicht gefunden";
    }

    $fetch = mysqli_fetch_assoc($result);
    $guthaben_alt = $fetch['guthaben'];
    $guthaben_neu = $guthaben_alt + $betrag;

    //Guthaben aktualisieren
    $stmt = mysqli_prepare($conn, "UPDATE users SET guthaben = ? WHERE username = ?");
    if (!$stmt) {
        die("SQL-Fehler: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ds", $guthaben_neu, $username);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) === 1) {
        return "<br>Einzahlung erfolgreich";
    } else {
        return "<br>Einzahlung fehlgeschlagen";
    }
}



function auszahlung($conn)
{
    if (!isset($_POST['ausfuehren_btn'])) {
        return;
    }

    $username = $_SESSION['username'];
    $betrag = floatval($_POST['betrag']);

    //Guthaben abrufen
    $stmt = mysqli_prepare($conn, "SELECT guthaben FROM users WHERE username = ?");
    if (!$stmt) {
        die("SQL-Fehler: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) !== 1) {
        return "<br>!ERROR - Benutzer nicht gefunden";
    }

    $fetch = mysqli_fetch_assoc($result);
    $guthaben_alt = $fetch['guthaben'];

    // Prüfen, ob genug Guthaben vorhanden ist
    if ($betrag > $guthaben_alt) {
        return "<br>!ERROR - Nicht genug Guthaben";
    }

    $guthaben_neu = $guthaben_alt - $betrag;

    //Guthaben aktualisieren
    $stmt = mysqli_prepare($conn, "UPDATE users SET guthaben = ? WHERE username = ?");
    if (!$stmt) {
        die("SQL-Fehler: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ds", $guthaben_neu, $username);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) === 1) {
        return "<br>Auszahlung erfolgreich";
    } else {
        return "<br>Auszahlung fehlgeschlagen";
    }
}


function ueberweisungausfuehren($conn)
{
    if (isset($_POST['senden_btn'])) {
        $username_sender = $_SESSION['username'];
        $username_empfaenger = $_POST['name'];
        $betrag = $_POST['betrag'];
        $verwendungszweck = $_POST['verwendungszweck'];
        $datum = date("Y-m-d H:i:s");

        $sql = "UPDATE users SET guthaben = guthaben - $betrag WHERE username = '$username_sender'";
        $result = mysqli_query($conn, $sql);

        $sql = "UPDATE users SET guthaben = guthaben + $betrag WHERE username = '$username_empfaenger'";
        $result = mysqli_query($conn, $sql);

        $sql = "INSERT INTO transaktionen (username_sender, username_empfaenger, betrag, datum, verwendungszweck) VALUES ('$username_sender', '$username_empfaenger', '$betrag', '$datum', '$verwendungszweck')";
        $result = mysqli_query($conn, $sql);

        return "Überweisung erfolgreich ausgeführt";
    }
}


function transaktionshistorieanzeigen($conn)
{
    $username_sender_session = $_SESSION['username'];
    $sql = "SELECT * FROM transaktionen WHERE username_sender = '$username_sender_session' OR username_empfaenger = '$username_sender_session'";
    $result = mysqli_query($conn, $sql);
    $html_output = "";

    //Daten aus Array $result als mysqli_result-Objekt auslesen
    //while‑Schleife läuft so oft, wie die SQL‑Abfrage Zeilen zurückliefert
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
    return $html_output;
}