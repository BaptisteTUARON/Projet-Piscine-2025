<div>
<?php

if (isset($_SESSION['utilisateur_role'])) {
    $role = $_SESSION['utilisateur_role'];
    $nom = $_SESSION['utilisateur_nom'] ?? 'Inconnu';
    $prenom = $_SESSION['utilisateur_prenom'] ?? 'Inconnu';
    $email = $_SESSION['utilisateur_email'] ?? 'Inconnu';

    echo "<h2>Informations de l'utilisateur</h2>";
    echo "<p>Rôle : $role</p>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
    echo "<p>Email : $email</p>";

    $conn = new mysqli("localhost", "root", "", "projet_piscine");
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    $conn->close();
} else {
    echo "<p>Aucune information d'utilisateur disponible. Veuillez vous connecter.</p>";
}
?>
</div>
