<?php
$conn = new mysqli("localhost", "root", "", "projet_piscine");
if ($conn->connect_error) die("Erreur DB");

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
$plages = ["08:00", "10:00", "12:00", "14:00", "16:00", "18:00"];

$agents = $conn->query("SELECT ID, Nom, Prenom, Specialite FROM agent_immobilier");

while ($agent = $agents->fetch_assoc()) {
    echo "<h2 style='text-align:center;'>{$agent['Prenom']} {$agent['Nom']} -   {$agent['Specialite']}</h2>";
    echo "<table class='emploiDuTemps'>";
    echo "<tr><th>Heure</th>";
    foreach ($jours as $j) echo "<th>$j</th>";
    echo "</tr>";

    foreach ($plages as $debut) {
        //Correction ici : calculer l'heure de fin séparément
        $timestamp_debut = strtotime($debut);
        $fin = date("H:i", $timestamp_debut + 7200);

        echo "<tr><th>$debut - $fin</th>";
        foreach ($jours as $jour) {
            $sql = "SELECT id, est_reserve FROM disponibilite 
                    WHERE agent_id={$agent['ID']} 
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
    echo "</table><br>";
}
$conn->close();
?>
