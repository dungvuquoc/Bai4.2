<?php
date_default_timezone_set("asia/ho_chi_minh");
if ($_POST['sort'] == "name") {
    //hàm sắp xếp theo tên//
    $dirs = new DirectoryIterator('upload');
    foreach ($dirs as $key => $fileInfo) {
        if ($fileInfo->isDot()) continue;
        $name[$key] = $fileInfo->getFilename();
        $size[$key] = $fileInfo->getSize();
        $date_upload[$key] = date('h:i:sa d-m-Y', $fileInfo->getMTime());
        echo ($key-1)."<br>";
        echo "Tên File: " . $name[$key], PHP_EOL . "<br>";
        echo "Kích thước: " . $size[$key], PHP_EOL . "B<br>";
        echo "Ngày tải lên: " . $date_upload[$key], PHP_EOL . "<br><hr>";
    }
} elseif ($_POST['sort'] == "date") {
    //hàm sắp xếp theo thứ tự tải lên
    $files = scandir('upload', SCANDIR_SORT_DESCENDING);
    $size = sizeof($files) - 3;
    for ( $i = $size ; $i >= 0 ; $i-- ) {
        $no = $size - $i+ 1;
        echo  $no."<br>";
        echo $files[$i];
        echo "<hr>";
    }
}

