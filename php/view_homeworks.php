
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/view_homeworks.css">
    </head>
    <body>
        <h1>
            Homeworks uploaded for review
        </h1>
        <br>
        <h2>
            <?php

                $conn = new PDO("mysql:host=localhost; dbname=homework_system", "root", "");

                $homeworks_repository = "homeworks_repository";
                $homeworks = array_diff(scandir($homeworks_repository), array('.', '..'));

                $i = 1;
                foreach ($homeworks as $value) {
                    $check_stmt = $conn->prepare('SELECT * FROM homework_grades WHERE id=?');
                    $check_stmt->execute([$value]);
                    $check_result = $check_stmt->fetchAll();

                    if(count($check_result) != 1 && count($check_result) != NULL) {
                        echo "Inconsistency!";
                        exit();
                    }

                    if($check_result == null) {
                        echo $i . ".    " . $value . "<br>";
                    } else {
                        echo $i . ".    " . $value . "  -  Grade: " . $check_result[0]['grade'] . "<br>";
                    }
                    $i = $i + 1;
                }
            ?>
        </h2>
        <div>
            <br>
            <h3>
                Download submited homework
            </h3>
            <form action="download_file.php" method="GET">
                <div>
                    <input type="text" name="homework_name" id=homework_name>
                    <button type="submit" name="download_homework"> Download
                    </button>
                </div>
            </form>
        </div>
        <br>
        <h3>
            Submit homework
        </h3>
        <form action="process_file_uploading.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="file" id=file>
                <button type="submit" name="upload_homework"> Upload
                </button>
            </div>
        </form>
        <br>
        <h3>
            Grade homework
        </h3>
        <div>
            <form action="grade_homework.php" method="POST">
                <div>
                    <input type="text" name="hwork" id=hwork>
                    <input type="number" min=2 max=6 name="grade" id=grade>
                    <button type="submit" name="grade_homework"> Grade
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>