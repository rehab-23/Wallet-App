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
                    <input type="username" class="form-control" id="username" aria-describedby="emailHelp"
                        name="username" placeholder="username" required="">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email eingeben</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                        placeholder="email" required="">
                </div>
                <div class="mb-3">
                    <label for="passwordeingabe" class="form-label">Passwort eingeben</label>
                    <input type="password" class="form-control" id="passwordeingabe" name="password"
                        placeholder="password" required="">
                </div>
                <div class="mb-3">
                    <label for="passwordeingabe" class="form-label">Passwort wiederholen</label>
                    <input type="password" class="form-control" id="passwordeingabe" name="password_wdh"
                        placeholder="password" required="">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <input type="submit" class="btn btn-primary" name="register_btn" value="registrieren"></input><br><br>
            </form>
            <br>
            <?php echo buttonblau("index.php", "zurück"); ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>