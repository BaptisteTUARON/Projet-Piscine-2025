

<div>
<?php
//Afficher les informations de l'utlisateur connecté (admin, agent ou client)

if (isset($_SESSION['utilisateur_role'])) {
    $role = $_SESSION['utilisateur_role'];
    $nom = isset($_SESSION['utilisateur_nom']) ? $_SESSION['utilisateur_nom'] : 'Inconnu';
    $prenom = isset($_SESSION['utilisateur_prenom']) ? $_SESSION['utilisateur_prenom'] : 'Inconnu';
    $email = isset($_SESSION['utilisateur_email']) ? $_SESSION['utilisateur_email'] : 'Inconnu';

    echo "<h2>Informations de l'utilisateur</h2>";
    echo "<p>Rôle : $role</p>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
    echo "<p>Email : $email</p>";
} else {
    echo "<p>Aucune information d'utilisateur disponible. Veuillez vous connecter.</p>";
}


?>
</div>
