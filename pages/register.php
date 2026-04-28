<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/funktionen.php';
echo registrieren($conn);
?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . '/../templates/head.php'; ?>

<body>
    <?php require_once __DIR__ . '/../templates/header.php'; ?>
    <h1 class="ueberschrift-zentriert">- Registrierung -</h1>
    <div class="container-wrapper">
        <div class="container-content">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username eingeben</label>
                    <input type="name" class="form-control" id="username" name="username" placeholder="..." required="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email eingeben</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="..." required="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Passwort eingeben</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="..."
                        required="">
                </div>
                <div class="mb-3">
                    <label for="password_wdh" class="form-label">Passwort wiederholen</label>
                    <input type="password" class="form-control" id="password_wdh" name="password_wdh" placeholder="..."
                        required="">
                </div>
                <input type="submit" class="btn btn-primary" name="register_btn" value="registrieren"></input><br>
            </form>
            <br>
            <?php echo buttonblau("index.php", "zurück"); ?>
        </div>
    </div>
    <?php require_once __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>