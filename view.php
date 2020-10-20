<?php
date_default_timezone_set("asia/ho_chi_minh");
if (($_SERVER['REQUEST_METHOD'] === 'POST') &&
    (isset($_FILES['fileupload']))
) {
    $files = $_FILES['fileupload'];

    $names      = $files['name'];
    $types      = $files['type'];
    $tmp_names  = $files['tmp_name'];
    $errors     = $files['error'];
    $sizes      = $files['size'];

    $numitems = count($names);
    $numfiles = 0;
    for ($i = 0; $i < $numitems; $i++) {
        //Kiểm tra file thứ $i trong mảng file, up thành công không?
        if ($errors[$i] == 0) {
            $allowUpload = true;
            $target_dir    = "upload/";
            $target_file   = $target_dir . basename($names[$i]);

            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            if (file_exists($target_file)) {
                echo "Tên file đã tồn tại trên server, không được ghi đè<br>";
                $allowUpload = false;
            }

            //Code xử lý di chuyển file đến thư mục cần thiết và hiển thị thông tin
            if ($allowUpload) {
                if (move_uploaded_file($tmp_names[$i], $target_file)) {
                    echo "File " . basename($names[$i]) .
                        " đã upload thành công.<br>";
                }
                $date_up[$i] = date('h:i:sa d-m-Y');
                echo "Bạn upload file thứ: " . ($numfiles + 1) . "<br>";
                echo "Tên file: $names[$i] <br>";
                echo "Lưu tại: upload/$names[$i] <br>";
                echo "Cỡ file: $sizes[$i] B<br>";
                echo "Ngày tải lên: " . $date_up[$i] . "<br><hr>";
                $numfiles++;
            }
        }
    }

    echo "<br>Tổng số file upload: " . $numfiles;
}
?>
<form method="post" action="sort.php">
    <input type="radio" name="sort" value="name" checked>
    <label for="sort-by-name">sort by name</label><br>
    <input type="radio" name="sort" value="date">
    <label for="sort-by-date-upload">sort by date upload</label><br>
    <input type="submit" value="submit">
</form>