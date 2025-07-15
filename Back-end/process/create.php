<?php
include '../config.php';

$title = $_POST['title'];
$thumb = $_POST['thumbnail'];
$content = $_POST['content'];
$stmt = $conn->prepare("INSERT INTO blog (title, thumbnail, content) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $thumb, $content);
$stmt->execute();
$stmt->close();

header("Location: ../views/list.php");
?>