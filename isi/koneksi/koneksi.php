<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'db_tiket2');
$kdb = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//if (!$kdb) {
//    trigger_error('Tidak dapat terkoneksi ke Database Engine MySQL: ' . mysqli_connect_error());
//}
?>