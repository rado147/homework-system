<?php

if(isset($_GET['download'])) {
    $file = "files_repository/" . $_GET['file_name'];

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Transfer-Encoding: binary");

    readdir($file);
}

?>