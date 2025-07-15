<?php
include '../config.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Method dan ID
$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;

// Validasi ID
if (!$id) {
    http_response_code(400);
    echo json_encode(["error" => "ID dibutuhkan"]);
    exit;
}

// Escape ID
$id = mysqli_real_escape_string($conn, $id);

if ($method === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = mysqli_real_escape_string($conn, $data['title']);
    $thumb = mysqli_real_escape_string($conn, $data['thumbnail']);
    $content = mysqli_real_escape_string($conn, $data['content']);

    $q = mysqli_query($conn, "UPDATE blog SET title='$title', thumbnail='$thumb', content='$content' WHERE id='$id'");

    if ($q) {
        echo json_encode(["message" => "Berhasil diperbarui"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Gagal memperbarui"]);
    }
}

elseif ($method === 'DELETE') {
    $q = mysqli_query($conn, "DELETE FROM blog WHERE id='$id'");
    
    if ($q) {
        echo json_encode(["message" => "Berhasil dihapus"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Gagal menghapus"]);
    }
}
