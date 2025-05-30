<?php

// Code pour simplement afficher un message pour confirmer la déconnexion et renvoie à index.html
// SI l y a une session active, on la détruit
session_start();
// Détruire la session pour déconnecter l'utilisateur
session_unset();
session_destroy();
// Rediriger vers la page d'accueil ou index.html
header("Location: index.php");
exit();
?>
