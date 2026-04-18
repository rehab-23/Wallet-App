<?php 
    //code;
    function linkanzeigen() {
        if(isset($_SESSION['username'])) {
            return '<a href="home.php">zurück</a><br>';
        } else {
            return 'Session nicht gestartet... <br><a href="index.php">zur Hauptseite</a><br>';
        }
    }

    function auszahlung($config) {
        if(isset($_POST['ausfuehren_btn'])) {
            $username= $_SESSION['username'];
            $betrag= $_POST['betrag'];
            //Username vergleichen aus Session
            //Abfrage um Wert von Guthaben für Verrechnung zu haben
            //als Variable + neues Einzahl-Betrag addieren
            $sql= "SELECT guthaben FROM users WHERE username = '$username'";
            $result= mysqli_query($config, $sql);

            $row= mysqli_num_rows($result); 
                        
            //ggf. Fehlermeldung ausgeben
            if(!$result) {
                die("SQL-Fehler: " . mysqli_error($config));
            }

            if($row == 1) {
                $fetch = mysqli_fetch_assoc($result);
                $guthaben_alt = $fetch['guthaben'];
                $guthaben_neu= $guthaben_alt - $betrag;
                $sql = "UPDATE users SET guthaben='$guthaben_neu' WHERE username='$username'";
                $result= mysqli_query($config, $sql);
                return "<br>Auszahlung erfolgreich";
            } else {
                return "<br>!ERROR - Benutzer nicht gefunden";
            }
        }
    }

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

    function welcomemessage() {
        if(isset($_SESSION['username'])) {
            return "Welcome, ".$_SESSION['username']." !";
        } else {
            header('location:login.php');
            exit;
        }
    }



    //GUTHABEN DES USERS ABFRAGEN UND AUSGEBEN
    //Username vergleichen aus Session
    //Aktuellen guthaben-Wert Abfragen und ausgeben
    function guthabenabfrage($config) {
        $username= $_SESSION['username'];
        $sql= "SELECT guthaben FROM users WHERE username = '$username'";
        $result= mysqli_query($config, $sql);
        $row= mysqli_num_rows($result); 
            
        //ggf. Fehlermeldung ausgeben
        if(!$result) {
            die("SQL-Fehler: " . mysqli_error($config));
        }

        if($row == 1) {
            $fetch = mysqli_fetch_assoc($result);
            $guthaben = $fetch['guthaben'];
            return $guthaben;
        } else {
            return "<br>!ERROR - Guthaben nicht gefunden";
        }
    }


    function loeschbuttonausfuehren($config) {
        if(isset($_POST['loeschbutton'])) {
            $getusername = $_SESSION['username'];

            $select= "DELETE FROM users WHERE username= '$getusername'";

            $query= mysqli_query($config, $select);
            $row= mysqli_num_rows($query);
            $fetch= mysqli_fetch_array($query);

            if($row == 1) {
                session_unset();
                session_destroy();
                header("location: login.php");
                exit;
            } else {
                return "username existiert nicht in datenbank";
            }
        }
    }

    function einloggen($config) {
        if(isset($_POST['login_btn'])) {
            $email= $_POST['email'];
            $passwordeingabe= $_POST['passwordeingabe'];

            $select= "SELECT username, email, password FROM users WHERE email= '$email'";
            $query= mysqli_query($config, $select);
            //daten als array
            $fetch= mysqli_fetch_assoc($query);

            if($fetch) {
                $pwverify= password_verify($passwordeingabe, $fetch['password']);
                var_dump($pwverify);
                session_start();
                $_SESSION['username'] = $fetch['username'];
                header('location:home.php');
                exit;
            } else {
                return "email und/oder passwort ungültig";
            }
        }
    }

    function registrieren($config) {
        if(isset($_POST['register_btn'])) {
            $username= $_POST['username'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $password_wdh= $_POST['password_wdh'];

            //1. kontrolle: email + username prüfen
            $select= "SELECT * FROM users WHERE email= '$email' OR username = '$username'";
            $query= mysqli_query($config, $select);
            $row= mysqli_num_rows($query);
            $fetch= mysqli_fetch_array($query);

            if($row == 0) {
                //2. kontrolle: passwort prüfen
                return "<br>Reg wird eingeleitet";
                if($password_wdh == $password) {
                    $select= "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hashed')";
                    $query= mysqli_query($config, $select);

                    if ($query) {
                        header('Location: login.php');
                        exit;
                    } else {
                        return "Fehler beim Registrieren: " . mysqli_error($config);
                    }
                } else {
                    return "<br>password stimmt nicht überein, Registrierung abgebrochen";
                }
            } else {
                return "<br>email und/oder username bereits registriert, Reg fehlgeschlagen";
            }
        }
    }

    function transaktionshistorieanzeigen($config) {
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

        return $html_output;
    }

    function ueberweisungausfuehren($config) {
        if(isset($_POST['senden_btn'])) {
        
            $username_sender= $_SESSION['username'];
            $username_empfaenger= $_POST['name'];
            $betrag= $_POST['betrag'];
            $verwendungszweck= $_POST['verwendungszweck'];
            $datum = date("Y-m-d H:i:s");
            
            //Update Guthaben Sender in Users
            $sql= "UPDATE users SET guthaben = guthaben - $betrag WHERE username = '$username_sender'";
            $result= mysqli_query($config, $sql);


            //Update Guthaben Empfaenger in Users
            $sql= "UPDATE users SET guthaben = guthaben + $betrag WHERE username = '$username_empfaenger'";
            $result= mysqli_query($config, $sql);
    
            //Erstelle neue Transaktion in transaktionen
            $sql= "INSERT INTO transaktionen (username_sender, username_empfaenger, betrag, datum, verwendungszweck) VALUES ('$username_sender', '$username_empfaenger', '$betrag', '$datum', '$verwendungszweck')";
            $result= mysqli_query($config, $sql);

            return "Überweisung erfolgreich ausgeführt";
        }
    }

    function buttonblau($seitenlink, $bezeichnung) {
    return "<p><a class='btn btn-primary' href='$seitenlink' role='button'>$bezeichnung</a></p>";
    }


?>