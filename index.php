<?php include 'config/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD user dengan PostgresSQL</title>
  <link rel="stylesheet" href="dist/css/bootstrap.css">
</head>
<body class="m-2">
  <a class="btn btn-primary mb-2" href="tambah_user.php">tambahkan user</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = $db->query("SELECT * FROM users");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $i = 1;
        if ($query->rowCount() > 0) {
          foreach ($data as $d) {
      ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $d['name'] ?></td>
        <td><?= $d['username'] ?></td>
        <td><?= $d['email'] ?></td>
        <td>
          <a class="btn btn-warning" href="ubah_user.php?id=<?= $d['id'] ?>">ubah</a>
          <a class="btn btn-danger" href="hapus_user.php?id=<?= $d['id'] ?>" onclick="confirm('Apa anda yakin ingin menghapus data user ini?')">hapus</a>
        </td>
      </tr>
      <?php } } else {?>
      <tr>
        <td colspan="5" class="text-center">Tidak ada data user</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <script src="dist/js/bootstrap.js"></script>
</body>
</html>