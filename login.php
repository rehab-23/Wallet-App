<?php
include 'Config.php';
include 'funktionen.php';
echo einloggen($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>

    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Login -</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email eingeben</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        placeholder="email" required="">
                </div>
                <div class="mb-3">
                    <label for="passwordeingabe" class="form-label">Passwort eingeben</label>
                    <input type="password" class="form-control" id="passwordeingabe" name="passwordeingabe"
                        placeholder="password" required="">
                </div>
                <input type="submit" class="btn btn-primary" name="login_btn" value="login"></input><br><br>
            </form>
            <?php echo buttonblau("index.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>