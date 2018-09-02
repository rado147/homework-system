<?php

if(isset($_GET['download'])) {
    
    $file = "files_repository/" . $_GET['file_name'];

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");

    readfile($file);
} else if(isset($_GET['download_homework'])) {
    $homework = "homeworks_repository/" . $_GET['homework_name'];

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$homework");
    header("Content-Transfer-Encoding: binary");

    readfile($homework);
}

?>