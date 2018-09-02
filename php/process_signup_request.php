<?php

function validate_input_parameters($username, $password) {
    if(strlen($username) < 5 || strlen($password) < 7) {
        echo "Invalid size of username or password";
        exit();
    }
}

$conn = new PDO("mysql:host=localhost; dbname=homework_system", "root", "");

$username = $_POST['username'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

validate_input_parameters($username, $password);

$check_stmt = $conn->prepare('SELECT * FROM signed_users WHERE username=?');
$check_stmt->execute([$username]);
$check_result = $check_stmt->fetchAll();

if(count($check_result) != NULL) {
    echo "There is already someone with this 'username'";
    exit();
}

if($password != $repeat_password) {
    echo "Passwords are not matching!";
    exit();
}

$query = $conn->prepare(" INSERT INTO signed_users (username, password)
    VALUES (:username, :password)");

$query->bindParam(':username', $username);
$query->bindParam(':password', $password);

$query->execute();

header("Location: /login.html");
exit();

?>