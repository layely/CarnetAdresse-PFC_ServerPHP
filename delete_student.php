<?php

$ine = filter_input(INPUT_GET, 'ine');

$servername = "localhost";
$dbname = "DBcarnetadresse";
$username = "gl";
$password = "gl";
if (isset($ine)) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br>";

        $sql = "DELETE FROM Etudiant WHERE INEetu = :ine";

        $sth = $conn->prepare($sql);
        $sth->bindParam(':ine', $ine);
        $sth->execute();

        echo "delete successful <br>";
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    echo '{"error" : "no legal argument of lastNumSynced"}';
}