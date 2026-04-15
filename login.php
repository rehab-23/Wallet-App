<?php
    include 'Config.php';
    
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