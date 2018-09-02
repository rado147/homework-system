
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
                <button type="submit" name="submit"> Upload
                </button>
            </div>
        </form>
    </body>
</html>