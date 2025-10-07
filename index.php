<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Pendaftaran SMK Jateng - Online</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="container">
<h1>Pendaftaran Online SMK Jateng</h1>
<p>Silakan isi formulir pendaftaran berikut. Data yang dimasukkan akan diverifikasi oleh pihak sekolah.</p>


<form action="submit.php" method="post" enctype="multipart/form-data" class="form">
<label>Nama lengkap <input type="text" name="nama" required></label>
<label>NISN <input type="text" name="nisn"></label>
<label>Tanggal Lahir <input type="date" name="ttl"></label>
<label>Alamat <textarea name="alamat"></textarea></label>
<label>Sekolah Asal <input type="text" name="sekolah_asal"></label>
<label>Jurusan Pilihan
<select name="jurusan" required>
<option value="Teknik Mesin">Teknik Mesin</option>
<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
<option value="Akuntansi">Akuntansi</option>
</select>
</label>
<label>Email <input type="email" name="email"></label>
<label>Telepon/HP <input type="tel" name="telepon"></label>
<label>Upload Foto KTP / Rapor (jpg/png, max 2MB)
<input type="file" name="foto" accept="image/*">
</label>


<div class="actions">
<button type="submit">Kirim Pendaftaran</button>
<a class="btn-link" href="admin.php">Halaman Admin</a>
</div>
</form>
</main>
</body>
</html>