
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            Homeworks uploaded for review
        </h1>
        <br>
        <h2>
            <?php
            $homeworks_repository = "homeworks_repository";
            $homeworks = array_diff(scandir($homeworks_repository), array('.', '..'));

            foreach ($homeworks as $value) {
                echo $value;
                echo "<br>";
            }
            ?>
        </h2>
        <div>
            <br>
            <form action="download_file.php" method="GET">
                <div>
                    <input type="text" name="homework_name" id=homework_name>
                    <button type="submit" name="download_homework"> Download
                    </button>
                </div>
            </form>
        </div>
        <br>
        <form action="process_file_uploading.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="file" id=file>
                <button type="submit" name="upload_homework"> Upload
                </button>
            </div>
        </form>
    </body>
</html>