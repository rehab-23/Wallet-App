<!DOCTYPE html>
<html lang="en">

<?php
require_once __DIR__ . '/../templates/head.php';
require_once __DIR__ . '/../src/funktionen.php';
?>

<br><br><br>

<body>
    <?php require_once __DIR__ . '/../templates/header.php'; ?>
    <h1 class="ueberschrift-zentriert">- Landingpage -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <div class="btn-group-vertical landing-buttons" role="group" aria-label="Vertical button group">
                <a class="btn btn-primary" href="/../pages/login.php">Einloggen</a>
                <a class="btn btn-primary" href="register.php">Registrieren</a>
            </div>
        </div>
    </div>
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>