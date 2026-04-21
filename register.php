<?php
    include 'Config.php';
    include 'funktionen.php';

    echo registrieren($config);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Registrierung -</h1>
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
    <?php include 'footer.php'; ?>
</body>

</html>