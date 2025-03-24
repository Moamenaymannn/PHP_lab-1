<?php
session_start();
require_once "validator.php";

$errors = [];
$old_values = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_values = $_POST;
    $errors = validateInput($_POST);

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_values'] = $old_values;
        header("Location: register.php");
        exit();
    } else {
       
        $_SESSION['form_data'] = $_POST;
        
        header("Location: prev.php");
        exit();
    }
}
?>
