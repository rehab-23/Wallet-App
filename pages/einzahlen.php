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
    <h1 class="ueberschrift-zentriert">- Einzahlen -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="betrag" class="form-label">Betrag eingeben</label>
                    <input type="number" class="form-control" id="betrag" name="betrag" placeholder="..." step="0.01"
                        min="0.01" required="">
                </div>
                <input type="submit" class="btn btn-primary" name="ausfuehren_btn" value="ausführen"></input><br><br>
            </form>
            <?php
            echo einzahlung($conn);
            echo buttonblau("home.php", "zurück");
            ?>
        </div>
    </div>
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>