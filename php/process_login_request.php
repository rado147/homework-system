<?php

$conn = new PDO("mysql:host=localhost; dbname=homework_system", "root", "");

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare('SELECT * FROM signed_users WHERE username=? and password=?');

$stmt->execute([$username, $password]);

$result = $stmt->fetchAll();

if(count($result) > 1) {
    echo "Inconsistency in database!";
    exit();
} else if($result == NULL) {
    echo "Wrong credentials!";
    exit();
} else {
    header("Location: /panel.php?name=" . $result[0]['username']);
    exit();
}

?>