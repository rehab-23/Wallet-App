<?php
    include 'Config.php';

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
                echo "<br>Reg wird eingeleitet";
                if($password_wdh == $password) {
                    $select= "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hashed')";
                    $query= mysqli_query($config, $select);

                    if ($query) {
                        header('Location: login.php');
                        exit;
                    } else {
                        echo "Fehler beim Registrieren: " . mysqli_error($config);
                    }
                } else {
                    echo "<br>password stimmt nicht überein";
                    echo "<br>Reg abgebrochen";
                }
            } else {
                echo "<br>email und/oder username bereits registriert, Reg fehlgeschlagen";
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
            <h1>- Registrierung -</h1>

            <form action="" method="POST">
                <input type="username" name="username" placeholder="username" required=""><br><br>
                <input type="email" name="email" placeholder="email" required=""><br><br>
                <input type="password" name="password" placeholder="password" required=""><br><br>
                <input type="password" name="password_wdh" placeholder="password again" required=""><br><br>
                <input type="submit" name="register_btn" value="registrieren"><br><br>
            </form>

            <br>
            <p><a href="index.php">zur Hauptseite</a><br></p>

        </div>
</body>

</html>