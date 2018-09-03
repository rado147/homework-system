
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/panel.css">
    </head>
    <body>
        <h1>
            <?php
                echo "Hello, " . $_GET['name'] . "  :)"; 
            ?>
        </h1>
        <form action="process_file_uploading.php?" method="POST" enctype="multipart/form-data">
            <div class="upload_div">
                <input type="file" name="file" id=file>
                <button type="submit" name="upload"> Upload
                </button>
            </div>
        </form>
        <div>
            <br>
            <h2>
                Here are the current tasks:
            </h2>
            <br>
            <?php
                $files_repository = "files_repository";
                $files = array_diff(scandir($files_repository), array('.', '..'));

                $i = 1;
                foreach ($files as $value) {
                    echo $i . ".     " . $value;
                    echo "<br>";
                    $i = $i + 1;
                }

            ?>            
        </div>
        <div>
            <br>
            <br>
            <form action="download_file.php" method="GET">
                <div>
                    <input type="text" name="file_name" id=file_name value="Name of file">
                    <button type="submit" name="download"> Download
                    </button>
                </div>
            </form>
        </div>
        <div>
            <br>
            <form action="view_homeworks.php" method="GET">
                <button type="submit" name="view" id=view class="view_button"> View Homeworks
                </button>
            </form>
        </div>
    </body>
</html>