<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/funktionen.php';
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/../templates/head.php'; ?>

<body>
    <?php require_once __DIR__ . '/../templates/header.php'; ?>
    <h1 class="ueberschrift-zentriert">- Überweisung -</h1>
    <div class="container-wrapper">
        <div class="container-content">
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
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>