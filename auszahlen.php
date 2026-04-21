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
            <h1>- Auszahlen -</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="betrag" class="form-label">Betrag eingeben</label>
                    <input type="number" class="form-control" id="betrag" name="betrag" placeholder="..." step="0.01"
                        min="0.01" required="">
                </div>
                <input type="submit" class="btn btn-primary" name="ausfuehren_btn" value="ausführen"></input><br><br>
            </form>
            <?php 
                echo auszahlung($config);
                echo buttonblau("home.php", "zurück"); 
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>