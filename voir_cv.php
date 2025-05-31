<?php
$conn = new mysqli("localhost", "root", "", "projet_piscine");
if ($conn->connect_error) die("Erreur de connexion à la base de données.");

if (!isset($_GET['id'])) {
    echo "ID de l'agent manquant.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT CV FROM agent_immobilier WHERE ID = $id";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $cvPath = $row['CV']; // exemple : cv/alice.pdf

    if ($cvPath && file_exists($cvPath)) {
        $extension = pathinfo($cvPath, PATHINFO_EXTENSION);

        // Rediriger vers le PDF
        if ($extension === 'pdf') {
            header("Location: $cvPath");
            exit;
        } else {
            echo "<p>Type de fichier non PDF détecté.</p>";
            echo "<a href='$cvPath' target='_blank'>Ouvrir dans un nouvel onglet</a>";
        }
    } else {
        echo "CV introuvable.";
    }
} else {
    echo "Agent non trouvé.";
}

$conn->close();
?>

