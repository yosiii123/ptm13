<?php
include '../config.php';

$limit = 5;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM blog");
$total = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total / $limit);

$data = mysqli_query($conn,"SELECT * FROM blog LIMIT $start,$limit");
?>

<h2>Daftar Blog</h2>
<a href="form_create.php">+ Tambah</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Judul Artikel</th>
        <th>thumbnail</th>
     
        <th>Aksi</th>
    </tr>
    <?php while($b = mysqli_fetch_assoc($data)):?>
    <tr>
        <td> <?= $b['id']?></td>
            <td><?= htmlspecialchars($b['title'] ?? '') ?></td>
            <td><img src="<?= htmlspecialchars($b['thumbnail'] ?? '') ?>" width="100") ?></td>
        <td>
            <a href="form_edit.php?id=<?= $b['id'] ?>">Edit</a> |
            <a href="../process/delete.php?id=<?= $b['id'] ?>" onclick="return confirm('hapus?')">hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>