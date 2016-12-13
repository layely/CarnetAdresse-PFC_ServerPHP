<?php

//$ine = $_REQUEST['ine'];
$ine = filter_input(INPUT_GET, 'ine');
$numDossier = filter_input(INPUT_GET, 'numDossier');
$nom = filter_input(INPUT_GET, 'nom');
$prenom = filter_input(INPUT_GET, 'prenom');
$sexe = filter_input(INPUT_GET, 'sexe');
$dateNaissance = filter_input(INPUT_GET, 'dateNaissance');
$mobile1 = filter_input(INPUT_GET, 'mobile1');
$mobile2 = filter_input(INPUT_GET, 'mobile2');
$email = filter_input(INPUT_GET, 'email');
$adresse = filter_input(INPUT_GET, 'adresse');
$filiere = filter_input(INPUT_GET, 'filiere');
$promo = filter_input(INPUT_GET, 'promo');
$specialite = filter_input(INPUT_GET, 'specialite');
$niveau = filter_input(INPUT_GET, 'niveau');




echo $ine . " " . $numDossier, " End <br>";

$servername = "localhost";
$dbname = "DBcarnetadresse";
$username = "gl";
$password = "gl";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br>";

    $sql = "INSERT INTO `Etudiant` (`INEetu`, `numDossierEtu`, `nomEtu`, `prenomEtu`, `dateNaissEtu`, 
        `sexeEtu`, `mobile1Etu`, `mobile2Etu`, `emailEtu`, `adresseEtu`, `specialiteEtu`, `niveauEtu`, 
        `promoEtu`, `libeleFiliereEtu`) 
        VALUES (:ine, :numDossier, :nom, :prenom, :dateNaiss, :sexe, :mobile1, :mobile2, :email, 
        :adresse, :specialite, :niveau, :promo, :filiere);";
    
    $sth = $conn->prepare($sql);
    $sth->bindParam(':ine', $ine);
    $sth->bindParam(':numDossier', $numDossier);
    $sth->bindParam(':nom', $nom);
    $sth->bindParam(':prenom', $prenom);
    $sth->bindParam(':dateNaiss', $dateNaissance);
    $sth->bindParam(':sexe', $sexe);
    $sth->bindParam(':mobile1', $mobile1);
    $sth->bindParam(':mobile2', $mobile2);
    $sth->bindParam(':email', $email);
    $sth->bindParam(':adresse', $specialite);
    $sth->bindParam(':specialite', $specialite);
    $sth->bindParam(':niveau', $niveau);
    $sth->bindParam(':promo', $promo);
    $sth->bindParam(':filiere', $filiere);
    
    $sth->execute();
    
//    $results = $sth->fetchAll();

//    $json = json_encode($results);

    echo $json;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}  finally {
    $conn = null;
}

