<?php
    session_start();
    include 'Config.php';
    include 'funktionen.php';

    echo loeschbuttonausfuehren($config);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Einstellungen -</h1>

            <form method="post">
                <button type="submit" class="btn btn-danger" name="loeschbutton">Account dauerhaft löschen</button>
            </form>
            <br><br>
            <?php echo buttonblau("home.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>