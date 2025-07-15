<!-- Membuat Hapus -->
<?php
include '../config.php';
// Mendapatkan ID dari URL
$id = $_GET['id'] ?? null;

if (!$id) {
    http_response_code(400);
    echo json_encode(["error" => "ID dibutuhkan"]);
    exit;
}
// Escape ID untuk keamanan
$id = mysqli_real_escape_string($conn, $id);
// Query untuk menghapus data
$q = mysqli_query($conn, "DELETE FROM blog WHERE id='$id'");
if ($q) {
    echo json_encode(["message" => "Artikel berhasil dihapus"]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Artikel gagal dihapus"]);
}
// Redirect ke halaman daftar setelah penghapusan
header("Location: ../views/list.php");
exit;