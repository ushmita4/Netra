<?php
$host = '127.0.0.1';
$db   = 'netraworkers';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "Connection was successful <br>";
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$query = $_GET['query'];

echo $query;
echo '<br>';

$stmt = $pdo->query("SELECT * FROM workers WHERE (`sno` LIKE '%".$query."%')");
while ($row = $stmt->fetch())
{
    
    echo $row['name'] . "\n";
    echo '<br>';
    echo 'Payment Status: ' . $row['payment'] . "\n";
    //echo $row['payment'] . "\n";
}
?>