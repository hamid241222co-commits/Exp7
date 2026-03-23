<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $phone = trim($_POST["phone"]);

    $errors = [];

    // Name validation
    if (empty($name) || !preg_match("/^[A-Za-z\s]+$/", $name)) {
        $errors[] = "Invalid Name";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email";
    }

    // Password validation
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    // Phone validation
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid Phone Number";
    }

    // If errors → send back to form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST; // to keep entered values
        header("Location: form.php");
        exit();
    }

    // If valid
    $_SESSION['user'] = $name;
    setcookie("user", $name, time()+3600);

    header("Location: success.php");
    exit();
}
?>