<?php
session_start();
include 'Config.php';
include 'funktionen.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1 style="text-align: center;">- Transaktionshistorie -</h1>
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