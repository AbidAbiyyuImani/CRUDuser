<?php
include 'config/database_connection.php';

$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM users WHERE id = $id");
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['ubah_user'])) {
  $namaLengkap = $_POST['namaLengkap'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $query = $db->prepare("UPDATE users SET name = '$namaLengkap', username = '$username', email = '$email', password = '$password' WHERE id = $id");
  $query->execute();

  if($query) {
    echo "<script>alert('Ubah data user berhasil'); location.href='index.php'</script>";
  } else {
    echo "<script>alert('Ubah data user gagal')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data User</title>
  <link rel="stylesheet" href="dist/css/bootstrap.css">
</head>
<body class="m-2 d-flex">
  <div class="container">
    <div class="card col-12">
      <div class="card-body">
        <h3 class="mb-3">Ubah Data User</h3>
        <form method="post">
          <div class="mb-2">
            <label for="namaLengkap" class="form-label">nama lengkap</label>
            <input type="text" name="namaLengkap" id="namaLengkap" value="<?= $data['name'] ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label for="username" class="form-label">username</label>
            <input type="text" name="username" id="username" value="<?= $data['username'] ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label for="email" class="form-label">email</label>
            <input type="email" name="email" id="email" value="<?= $data['email'] ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" id="password" value="<?= $data['password'] ?>" class="form-control">
          </div>
          <a href="index.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="ubah_user" value="click" class="btn btn-primary">Ubah user</button>
        </form>
      </div>
    </div>
  </div>
  <script src="dist/js/bootstrap.js"></script>
</body>
</html>