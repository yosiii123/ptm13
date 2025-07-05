<?php
include 'config.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$conn = mysqli_connect("localhost", "root", "", "nama_database");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($method === 'GET') {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $result = mysqli_query($conn, "SELECT * FROM blog WHERE id='$id' LIMIT 1");
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $row['content'] = json_decode($row['content']);
            echo json_encode($row);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Artikel tidak ditemukan"]);
        }
    } else {
        // Ambil semua artikel
        $result = mysqli_query($conn, "SELECT * FROM blog ORDER BY id DESC");
        $blog = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row['content'] = json_decode($row['content']);
            $blog[] = $row;
        }
        echo json_encode($blog);
    }
}

elseif ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = mysqli_real_escape_string($conn, $data['title']);
    $thumb = mysqli_real_escape_string($conn, $data['thumbnail']);
    $content = mysqli_real_escape_string($conn, json_encode($data['content']));

    $q = mysqli_query($conn, "INSERT INTO blog (title, thumbnail, content) VALUES ('$title', '$thumb', '$content')");

    if ($q) {
        echo json_encode(["message" => "Berhasil disimpan"]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Gagal menyimpan"]);
    }
}
