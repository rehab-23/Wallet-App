<?php
session_start();
include 'Config.php';
include 'funktionen.php';
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <h1 class="ueberschrift-zentriert">- Home -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <br>
            <?php echo welcomemessage(); ?>
            <br><b>Aktuelles Guthaben:</b>
            <?php echo guthabenabfrage($conn); ?>
            <br><br><br>
            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <a class="btn btn-primary" href="einzahlen.php">Einzahlung</a>
                <a class="btn btn-primary" href="auszahlen.php">Auszahlung</a>
                <a class="btn btn-primary" href="dashboard.php">Dashboard</a>
                <a class="btn btn-primary" href="ueberweisung.php">Überweisung</a>
                <a class="btn btn-primary" href="transaktionshistorie.php">Transaktionshistorie</a>
                <a class="btn btn-primary" href="einstellungen.php">Einstellungen</a>
            </div>
            <br><br><br>
            <p><a class="btn btn-danger" href="logout.php">Logout</a></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>