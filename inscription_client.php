<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "projet_piscine";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$adresse1 = $_POST['adresse1'];
$adresse2 = $_POST['adresse2'];
$password = $_POST['password'];

// Valeurs par défaut pour les champs carte
$type_carte = "aucun";
$numero_carte = "aucun";
$nom_carte = "aucun";
$date_expiration = "00/00";
$code_securite = 000;

$sql = "INSERT INTO client 
(Nom, Prenom, Adresse_ligne1, Adresse_ligne2, Ville, Code_Postal, Pays, Telephone, Courriel, Type_Carte, Numero_Carte, Nom_Carte, Date_Expiration, Code_Securite, Motdepasse)
VALUES ('$nom', '$prenom', '$adresse1', '$adresse2', '', 0, '', '$telephone', '$email', '$type_carte', '$numero_carte', '$nom', '$date_expiration', $code_securite, '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie.";
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();
?>
