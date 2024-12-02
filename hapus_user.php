<?php
include 'config/database_connection.php';
$id = $_GET['id'];
$query = $db->prepare("DELETE FROM users WHERE id = $id");
$query->execute();
if($query) {
  echo "<script>alert('Hapus data user berhasil'); location.href='index.php'</script>";
} else {
  echo "<script>alert('Hapus data user gagal')</script>";
}

?>