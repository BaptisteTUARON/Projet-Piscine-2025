<?php
session_start();
$nom = isset($_SESSION['utilisateur_nom']) ? $_SESSION['utilisateur_nom'] : null;
$prenom = isset($_SESSION['utilisateur_prenom']) ? $_SESSION['utilisateur_prenom'] : null;
$role = isset($_SESSION['utilisateur_role']) ? $_SESSION['utilisateur_role'] : null;
?>
