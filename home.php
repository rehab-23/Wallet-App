<?php
    session_start();
    include 'Config.php';
    include 'funktionen.php';

    echo loeschbuttonausfuehren($config);
?>

<br>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Home -</h1>
            <?php echo welcomemessage(); ?>
            <form method="post">
                <button type="submit" class="btn btn-danger" name="loeschbutton">Account dauerhaft löschen</button>
            </form>

            <b>Aktuelles Guthaben:</b>
            <?php 
                echo guthabenabfrage($config); ?>
            <br>
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <a class="btn btn-primary" href="einzahlen.php">Einzahlung</a>
                <a class="btn btn-primary" href="auszahlen.php">Auszahlung</a>
                <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
                <a class="btn btn-primary" href="ueberweisung.php">Überweisung</a>
                <a class="btn btn-primary" href="transaktionshistorie.php">Transaktionshistorie</a>
            </div>
            <br><br><br><br>
            <p><a class="btn btn-danger" href="logout.php">Logout</a></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>