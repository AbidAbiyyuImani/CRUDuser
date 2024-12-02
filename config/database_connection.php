<?php 
// phpinfo();
$dbhost = "localhost";
$dbuser = "postgres";
$dbpass = "root";
$dbport = 3794;
$dbname = "crud_postgre";

try {
    $db = new PDO("pgsql:host=$dbhost;port=$dbport;dbname=$dbname;", $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($db) {
        echo "<script>console.log('connection successfull');</script>";
    } else {
        echo "<script>console.log('connection failed');</script>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}



?>