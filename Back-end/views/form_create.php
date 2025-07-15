<h2>Tambah Berita</h2>
<a href="list.php">Kembali ke daftar Berita</a>

<form action="../process/create.php" method="POST" style="margin-top:20px; max-width:600px;">
    <label for="title"><strong>Judul</strong></label><br>
    <input type="text" name="title" placeholder="Judul Berita" required style="width: 100%; padding:8px;"><br><br>
    <label for="thumbnail"><strong>thumbnail</strong></label><br>
    <textarea name="thumbnail" placeholder="Masukan URL atau base64 gambar" rows='3' style="width: 100%;padding:8px;" rows='4'></textarea><br><br>
    <label><strong>isi Konten :</strong></label><br>
    <textarea name="content" placeholder="Paragraf 1" rows='4' style="width: 100%;"></textarea> <br>
 
    <button type="submit" style="padding: 10px 20px;">+Simpan Berita</button>
</form>