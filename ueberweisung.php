<?php
    include 'Config.php';
    session_start();

    //code;         
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
            <h1>- Überweisung -</h1>
            <form action="" method="POST">
                <p><label for="">Überweisungsformular ausfüllen:</label><br></p>
                <p><input type="username" name="name" placeholder="username empfaenger" required=""></p>
                <p><input type="number" name="betrag" placeholder="betrag" step="0.01" min="0.01" required=""></p>
                <p><input type="text" name="verwendungszweck" placeholder="verwendungszweck" required=""></p>
                <p><input type="submit" name="senden_btn" value="senden"></p>
            </form>

            <p><a href="home.php">zurück</a></p>
        </div>
</body>

</html>