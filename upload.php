<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 4.2</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="view.php">
        <p>Chọn <?php $GLOBALS['a'] = $_POST['integer'];
                echo $a; ?> file để upload:
        </p>
        <input name="fileupload[]" type="file" multiple="multiple" />
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>