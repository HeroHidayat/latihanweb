<?php
    require 'db.php';
    $res = $mysqli->query('SELECT*FROM pendaftar ORDER BY tgl_daftar DESC');
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin - Pendaftar SMK Jateng</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="container">
<h1>Daftar Pendaftar</h1>
<p><a href="index.php">Form Pendaftaran</a></p>
<table class="table">
<thead>
<tr><th>ID</th><th>Nama</th><th>Jurusan</th><th>Email</th><th>Telepon</th><th>Tgl Daftar</th><th>Foto</th></tr>
</thead>
<tbody>
<?php while ($row = $res->fetch_assoc()): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo htmlspecialchars($row['nama']); ?></td>
<td><?php echo htmlspecialchars($row['jurusan']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['telepon']); ?></td>
<td><?php echo $row['tgl_daftar']; ?></td>
<td>
<?php if ($row['foto']): ?>
<a href="<?php echo $row['foto']; ?>" target="_blank">Lihat</a>
<?php else: ?>
-
<?php endif; ?>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</main>
</body>
</html>