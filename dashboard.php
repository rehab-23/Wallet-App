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
            <h1>- Dashboard -</h1>

            <form action="" method="POST">
                <label for="">Test</label><br>
            </form>

            <p><a href="home.php">zurück</a></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>