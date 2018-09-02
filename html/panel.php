
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>
            <?php
                echo "Hello, " . $_GET['name'] . "  :)"; 
            ?>
        </h1>
        <form action="process_file_uploading.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="file" id=file>
                <button type="submit" name="upload"> Upload
                </button>
            </div>
        </form>
        <div>
            <br>
            <?php
                $files_repository = "files_repository";
                $files = array_diff(scandir($files_repository), array('.', '..'));

                foreach ($files as $value) {
                    echo $value;
                    echo "<br>";
                }

            ?>            
        </div>
        <div>
            <br>
            <form action="download_file.php" method="GET">
                <div>
                    <input type="text" name="file_name" id=file_name>
                    <button type="submit" name="download"> Download
                    </button>
                </div>
            </form>
        </div>
        <div>
            <br>
            <form action="view_homeworks.php" method="GET">
                <button type="submit" name="view" id=view> View Homeworks
                </button>
            </form>
        </div>
    </body>
</html>