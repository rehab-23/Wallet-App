<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div style="display: flex; align-items: center; justify-content: center;">
        <div>
            <h1>- Landingpage -</h1>
            <?php 
                echo buttonblau("register.php", "Registrierung");
                echo buttonblau("login.php", "LogIn");
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>