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
                echo guthabenabfrage($config);

                echo buttonblau("einzahlen.php", "Einzahlung");
                echo buttonblau("auszahlen.php", "Auszahlung");
                echo buttonblau("dashboard.php", "Dashboard");
                echo buttonblau("ueberweisung.php", "Ueberweisung");
                echo buttonblau("transaktionshistorie.php", "Transaktionshistorie"); 
            ?>
            <br>
            <p><button type="button" class="btn btn-danger" name="logoutbutton">Logout</button></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>