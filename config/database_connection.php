<?php
// phpinfo();
$dbhost = "aws-0-ap-southeast-1.pooler.supabase.com";
$dbuser = "postgres.ghecpnpqcgyjnvstwuih";
$dbpass = "root";
$dbport = 6543;
$dbname = "postgres";

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
