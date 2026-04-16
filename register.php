<?php
    include 'Config.php';
    include 'funktionen.php';

    echo registrieren($config);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
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
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>