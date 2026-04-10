<?php
include 'Config.php';
session_start();
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
            <form method="post">
                <button type="submit" name="loeschbutton">Account dauerhaft löschen</button>
            </form>
            <?php
            if(isset($_SESSION['username'])) {
                //code;
                echo "Welcome, ".$_SESSION['username']." !";
            } else {
                echo "Session nicht gestartet";
                header('location:login.php');
                exit;
            }
            ?>

            <b>Aktuelles Guthaben:</b>
            <?php
            //GUTHABEN DES USERS ABFRAGEN UND AUSGEBEN
                $username= $_SESSION['username'];
                //Username vergleichen aus Session
                //Aktuellen guthaben-Wert Abfragen und ausgeben
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
                    echo $guthaben;
                } else {
                    echo "<br>!ERROR - Guthaben nicht gefunden";
                }
            ?>
            <p><a href="einzahlen.php">Einzahlung</a></p>
            <p><a href="auszahlen.php">Auszahlung</a></p>
            <p><a href="dashboard.php">Dashboard</a></p>
            <p><a href="ueberweisung.php">Ueberweisung</a></p>
            <p><a href="transaktionshistorie.php">Transaktionshistorie</a></p>
            <br>
            <p><a href="logout.php">Logout</a></p>
        </div>
        <?php
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
                    echo "username existiert nicht in datenbank";
                }
            }
        ?>
</body>

</html>