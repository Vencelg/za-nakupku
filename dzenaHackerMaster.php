<?php
$servername="localhost";
$username_SQL =  'sql_masickova';//sql_masickova
$password_SQL =  'fr2766YMWd7naRFh';//fr2766YMWd7naRFh
try {
    $conn = new PDO("mysql:host=$servername;dbname=sql_masickova", $username_SQL, $password_SQL);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT prezdivka, jmeno, email,role,overeno,poslední_prihlaseni FROM Uzivatel ORDER BY prezdivka";

    foreach ($conn->query($sql) as $row) {
        print_r($row);
        echo '<br>';
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
