<?php
/* Sürücü isteğiyle bir ODBC veritabanına bağlanalım */
$dsn = 'mysql:dbname=library;host=localhost';
$user = 'root';
$password = '';
 
try {
    $connect = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "Can't connect to database: " . $e->getMessage();
}
 
?>
 