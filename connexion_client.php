<?php
$conn = new mysqli("localhost", "root", "", "projet_piscine");
if ($conn->connect_error) die("Erreur de connexion");

$email = $_POST['mail'];
$password = $_POST['password'];

$sql = "SELECT * FROM client WHERE Courriel='$email' AND Motdepasse='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    session_start();
        $_SESSION['utilisateur_role'] = 'client'; 

        $row = $result->fetch_assoc();
        $nom = $row['Nom'];
        $prenom = $row['Prenom'];

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
