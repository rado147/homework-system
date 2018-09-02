<?php

$files_repository = 'files_repository/';

function is_extension_allowed($file_extension) {
    $allowed_extensions = array("jpg", "png", "jpeg", "pdf");
    return (in_array($file_extension, $allowed_extensions));
}

function is_file_size_allowed($file_size) {
    return $file_size < 5000000;
}

function is_file_error_valid($file_error) {
    return $file_error === 0;
}

if(isset($_POST['submit'])) {
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_error = $_FILES['file']['error'];
    $file_size = $_FILES['file']['size'];

    $file_extension = explode('.', $file_name);
    $file_real_extension = strtolower(end($file_extension));

    if((!is_extension_allowed($file_real_extension)) || (!is_file_size_allowed($file_size)) || (!is_file_error_valid($file_error))) {
        echo "Illegal parameters of file!";
        exit();
    }

    $file_name_new = uniqid('', true) . "." . $file_real_extension;
    $file_destination = $files_repository . $file_name_new;
    move_uploaded_file($file_tmp_name, $file_destination);


}
?>