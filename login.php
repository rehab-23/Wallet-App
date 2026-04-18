<?php
    include 'Config.php';
    include 'funktionen.php';

    echo einloggen($config);
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Login -</h1>
            <form action="" method="POST">
                <label for="">Email eingeben:</label><br>
                <input type="email" name="email" placeholder="email" required=""><br><br>
                <input type="password" name="passwordeingabe" placeholder="password" required=""><br><br>
                <input type="submit" name="login_btn" value="login"><br><br>
            </form>
            <?php echo buttonblau("index.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>