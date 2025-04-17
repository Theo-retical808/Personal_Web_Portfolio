<?php
include '../php/FileHandling.php';
$title = new FileHandling('../content/project_titles.txt');
$detail = new FileHandling('../content/project_details.txt');
$image = new FileHandling('../content/image_paths.txt');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = "../uploads/";
    $filePath = "../content/image_paths.txt";
    $newtitle = trim($_POST['title']);
    $newdetail = trim($_POST['detail']);

    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $files = $_FILES['images'];


    foreach ($files['tmp_name'] as $index => $tmpPath) {
        if ($files['error'][$index] === UPLOAD_ERR_OK) {
            $fileName = basename($files['name'][$index]);
            $uploadPath = $uploadDir . $fileName;

           
            if (move_uploaded_file($tmpPath, $uploadPath)) {
                file_put_contents($filePath, $uploadPath . PHP_EOL, FILE_APPEND);
            } else {
                echo "Failed to move the file: $fileName<br>";
            }
        } else {
            echo "Error uploading file: " . $files['name'][$index] . "<br>";
        }
    }

    $title->addNewContent($newtitle);
    $detail->addNewContent($newdetail);
    echo "<script>location.href = '../admin/project.php';</script>";
} else {
    echo "Invalid request.";
}
?>