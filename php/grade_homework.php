<?php

$hwork = $_POST['hwork'];
$grade = $_POST['grade'];

$conn = new PDO("mysql:host=localhost; dbname=homework_system", "root", "");

$check_stmt = $conn->prepare('SELECT * FROM homework_grades WHERE id=?');
$check_stmt->execute([$hwork]);
$check_result = $check_stmt->fetchAll();

if(count($check_result) != NULL) {
    echo "Already graded!";
    exit();
}

$query = $conn->prepare(" INSERT INTO homework_grades (id, grade)
    VALUES (:id, :grade)");

$query->bindParam(':id', $hwork);
$query->bindParam(':grade', $grade);

$query->execute();

header("Location: /view_homeworks.php");
exit();
?>