<?php
include '../php/FileHandling.php';
$title = new FileHandling('../content/project_titles.txt');
$detail = new FileHandling('../content/project_details.txt');
$image = new FileHandling('../content/image_paths.txt');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $newtitle = trim($_POST['title']);
        $newdetail = trim($_POST['detail']);
        $index = $_POST['index'];
        if (!empty($newtitle)) { 
            $title->editLineByIndex($index, $newtitle);
            $detail->editLineByIndex($index, $newdetail);
            echo "<script>location.href = '../admin/project.php';</script>";
        } 
    } elseif (isset($_POST['delete'])) {
        $index = $_POST['index'];
                $title->deleteLineByIndex($index);
                $detail->deleteLineByIndex($index);
                $image->deleteLineByIndex($index);
            }
            echo "<script>location.href = '../admin/project.php';</script>";
    }

?>