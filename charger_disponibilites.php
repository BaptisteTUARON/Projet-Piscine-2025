<?php
$conn = new mysqli("localhost", "root", "", "projet_piscine");
if ($conn->connect_error) die("Erreur DB");

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
$plages = ["08:00", "10:00", "12:00", "14:00", "16:00", "18:00"];

$agents = $conn->query("SELECT ID, Nom, Prenom, Specialite FROM agent_immobilier");

while ($agent = $agents->fetch_assoc()) {
    $idAgent = $agent['ID'];
    $nom = htmlspecialchars($agent['Nom']);
    $prenom = htmlspecialchars($agent['Prenom']);
    $specialite = htmlspecialchars($agent['Specialite']);

    echo "<div class='agent-section' style='margin-bottom: 40px;'>";

    echo "<h2 style='text-align:center;'>$prenom $nom - $specialite</h2>";

    echo "<table class='emploiDuTemps' border='1' style='margin:auto; border-collapse: collapse;'>";
    echo "<tr><th>Heure</th>";
    foreach ($jours as $j) echo "<th>$j</th>";
    echo "</tr>";

    foreach ($plages as $debut) {
        $timestamp_debut = strtotime($debut);
        $fin = date("H:i", $timestamp_debut + 7200); // +2h

        echo "<tr><th>$debut - $fin</th>";
        foreach ($jours as $jour) {
            $sql = "SELECT id, est_reserve FROM disponibilite 
                    WHERE agent_id=$idAgent 
                    AND jour_semaine='$jour' 
                    AND heure_debut='$debut' 
                    AND heure_fin='$fin'";
            $res = $conn->query($sql);
            if ($res && $res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $id_dispo = $row['id'];
                if ($row['est_reserve']) {
                    echo "<td style='background-color: gray;'>Réservé</td>";
                } else {
                    echo "<td style='background-color: white; cursor: pointer;' onclick='reserverCreneau($id_dispo)'>Disponible</td>";
                }
            } else {
                echo "<td style='background-color: #f2f2f2;'>-</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    // Boutons CV et Message
    echo "<div style='text-align: center; margin-top: 10px;'>";
    echo "<form action='voir_cv.php' method='GET' style='display: inline-block; margin-right: 10px;'>";
    echo "<input type='hidden' name='id' value='$idAgent'>";
    echo "<button type='submit'>Voir son CV</button>";
    echo "</form>";

    echo "<form action='envoyer_message.php' method='GET' style='display: inline-block;'>";
    echo "<input type='hidden' name='id' value='$idAgent'>";
    echo "<button type='submit'>Envoyer un message</button>";
    echo "</form>";
    echo "</div>";

    echo "</div><hr>";
}

$conn->close();
?>

