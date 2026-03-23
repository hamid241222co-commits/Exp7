<?php
session_start();

// Get old values (if any)
$old = $_SESSION['old'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="hero">
    <div class="login-box">
        <h2>User Registration</h2>

        <!-- ERROR DISPLAY -->
        <?php
        if(isset($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
                echo "<p class='error'>$error</p>";
            }
            unset($_SESSION['errors']);
        }
        ?>

        <form action="process.php" method="POST">

            <label>Name:</label>
            <input type="text" name="name" 
                value="<?php echo $old['name'] ?? ''; ?>">

            <label>Email:</label>
            <input type="text" name="email" 
                value="<?php echo $old['email'] ?? ''; ?>">

            <label>Password:</label>
            <input type="password" name="password">

            <label>Phone:</label>
            <input type="text" name="phone" 
                value="<?php echo $old['phone'] ?? ''; ?>">

            <input type="submit" value="Submit">
        </form>

        <?php unset($_SESSION['old']); ?>

    </div>
</div>

</body>
</html>