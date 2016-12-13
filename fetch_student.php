<?php

$lastNumSynced = filter_input(INPUT_GET, 'lastNumSynced');

$servername = "localhost";
$dbname = "DBcarnetadresse";
$username = "gl";
$password = "gl";
if (isset($lastNumSynced) && is_numeric($lastNumSynced)) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br>";

        $sql = "SELECT * FROM Etudiant WHERE num_sync_etu > :lastNumSynced";

        $sth = $conn->prepare($sql);
        $sth->bindParam(':lastNumSynced', $lastNumSynced);
        $sth->execute();
        $results = $sth->fetchAll();
        $json = json_encode($results);

        echo '<br>' . $json . '<br>';
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    echo "error : no legal argument of lastNumSynced";
}