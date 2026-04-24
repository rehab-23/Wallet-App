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
    <h1 class="ueberschrift-zentriert">- Transaktionshistorie -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <form action="" method="POST">
                <div id="transaktionshistorie">
                    <?php
                    echo transaktionshistorieanzeigen($conn);
                    ?>
                </div>
            </form>
            <br>
            <?php echo buttonblau("home.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>