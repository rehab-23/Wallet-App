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
    <h1 class="ueberschrift-zentriert">- Dashboard -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <form action="" method="POST">
                <label for="">Test</label><br>
            </form>
            <?php echo buttonblau("home.php", "zurück"); ?>
        </div>
    </div>
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>