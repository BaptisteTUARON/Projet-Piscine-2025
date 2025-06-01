<?php
$conn = new mysqli("localhost", "root", "", "projet_piscine");
if ($conn->connect_error) die("Erreur de connexion");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

$sql = "SELECT * FROM administrateur WHERE Nom='$nom' AND Prenom='$prenom' AND Courriel='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    session_start();
        $_SESSION['utilisateur_role'] = 'admin'; 
        $_SESSION['utilisateur_nom'] = $nom;
        $_SESSION['utilisateur_prenom'] = $prenom;
        $_SESSION['utilisateur_email'] = $email;

        header("Location: index.php");
  
} else {
    echo "<script>
        alert('Échec de la connexion. Vérifiez votre nom, prénom ou email.');
        window.location.href = 'compte.php';
    </script>";
}

$conn->close();
?>
