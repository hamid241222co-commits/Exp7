<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>  
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="hero">
    <div class="container">
        <h1>Registration Dashboard</h1>

        <p>Hello, <?php echo $_SESSION['user']; ?> 👋</p>

        <?php
        if(isset($_COOKIE['user'])) {
            echo "<p>Remembered User: " . $_COOKIE['user'] . "</p>";
        }
        ?>

        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>