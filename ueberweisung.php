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
            <h1>- Überweisung -</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username d. Empfängers eingeben</label>
                    <input type="username" class="form-control" name="name" placeholder="..." required="">
                </div>
                <div class="mb-3">
                    <label for="betrag" class="form-label">Überweisungsbetrag eingeben</label>
                    <input type="number" class="form-control" name="betrag" placeholder="..." step="0.01" min="0.01"
                        required="">
                </div>
                <div class="mb-3">
                    <label for="verwendungszweck" class="form-label">Verwendungszweck eingeben</label>
                    <input type="text" class="form-control" name="verwendungszweck" placeholder="..." required="">
                </div>
                <input type="submit" class="btn btn-primary" name="senden_btn" value="senden"></input><br><br>
            </form>
            <?php
            echo ueberweisungausfuehren($conn);
            echo buttonblau("home.php", "zurück");
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>