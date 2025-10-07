<?php
require 'db.php';


// fungsi bantu sederhana untuk membersihkan input
function clean($s) {
return htmlspecialchars(trim($s));
}


$nama = clean($_POST['nama'] ?? '');
$nisn = clean($_POST['nisn'] ?? '');
$ttl = $_POST['ttl'] ?? null; // format YYYY-MM-DD dari input date
$alamat = clean($_POST['alamat'] ?? '');
$sekolah_asal = clean($_POST['sekolah_asal'] ?? '');$jurusan = clean($_POST['jurusan'] ?? '');
$email = clean($_POST['email'] ?? '');
$telepon = clean($_POST['telepon'] ?? '');


// validasi minimal
$errors = [];
if (!$nama) $errors[] = 'Nama wajib diisi.';
if (!$jurusan) $errors[] = 'Pilih jurusan.';


// menangani upload file
$uploadPath = null;
if (!empty($_FILES['foto']['name'])) {
$f = $_FILES['foto'];
if ($f['error'] === UPLOAD_ERR_OK) {
if ($f['size'] <= 2 * 1024 * 1024) {
$ext = pathinfo($f['name'], PATHINFO_EXTENSION);
$allowed = ['jpg','jpeg','png'];
if (in_array(strtolower($ext), $allowed)) {
if (!is_dir('uploads')) mkdir('uploads', 0755, true);
$newName = uniqid('foto_') . '.' . $ext;
$dest = __DIR__ . '/uploads/' . $newName;
if (move_uploaded_file($f['tmp_name'], $dest)) {
$uploadPath = 'uploads/' . $newName;
} else {
$errors[] = 'Gagal menyimpan file.';
}
} else {
$errors[] = 'Format file tidak diperbolehkan.';
}
} else {
$errors[] = 'Ukuran file terlalu besar (max 2MB).';
}
} else {
$errors[] = 'Error saat upload file.';
}
}

if (!empty($errors)) {
// tampilkan pesan kesalahan singkat
echo '<h3>Terjadi kesalahan:</h3><ul>';
foreach ($errors as $e) echo '<li>' . $e . '</li>';
echo '</ul><p><a href="index.php">Kembali</a></p>';
exit;
}


// simpan ke database menggunakan prepared statement
$sql = "INSERT INTO pendaftar (nama, nisn, ttl, alamat, sekolah_asal, jurusan, email, telepon, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
echo 'Gagal menyiapkan query: ' . $mysqli->error;
exit;
}
$stmt->bind_param('sssssssss', $nama, $nisn, $ttl, $alamat, $sekolah_asal, $jurusan, $email, $telepon, $uploadPath);
if ($stmt->execute()) {
echo '<h3>Terima kasih — Pendaftaran berhasil!</h3>';
echo '<p>Nomor pendaftar: ' . $stmt->insert_id . '</p>';
echo '<p><a href="index.php">Kembali ke formulir</a></p>';
} else {
echo '<h3>Gagal menyimpan data: ' . $stmt->error . '</h3>';
}
$stmt->close();
?>

