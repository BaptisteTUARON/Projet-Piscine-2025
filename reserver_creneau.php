<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_piscine";

// Connexion BDD
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

// Vérification si le créneau est toujours dispo
$check = $conn->query("SELECT est_reserve FROM disponibilite WHERE id = $id");
$row = $check->fetch_assoc();
if ($row['est_reserve']) {
    echo "Ce créneau est déjà réservé.";
    exit;
}

// Mise à jour du créneau 
$sql = "UPDATE disponibilite SET est_reserve = 1, client_email = '$email' WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Réservation confirmée !";
} else {
    echo "Erreur lors de la réservation.";
}
$conn->close();
?>
