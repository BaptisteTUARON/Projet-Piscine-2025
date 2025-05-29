<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['search']) || trim($_POST['search']) === '') {
    return;
}

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found  = mysqli_select_db($db_handle, $database);

$search = isset($_POST["search"]) ? $_POST["search"] : "";

if ($db_found) {

    $sql = "SELECT bien_immobilier.ID, bien_immobilier.Ville FROM bien_immobilier";
    $sql2 = "SELECT agent_immobilier.Nom FROM agent_immobilier";
    
    $result = mysqli_query($db_handle, $sql);
    $result2 = mysqli_query($db_handle, $sql2);

    $found = false;

    echo "<h2>Résultats de la recherche : </h2>";

    while ($data = mysqli_fetch_assoc($result)) {
        if (stripos($data['ID'], $search) !== false || stripos($data['Ville'], $search) !== false) {

            echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
            echo "<p><strong>ID :</strong> " . htmlspecialchars($data['ID']) . "</p>";
            echo "<p><strong>Ville :</strong> " . htmlspecialchars($data['Ville']) . "</p>";
            echo "</div>";
            $found = true;
        }
    }

    while ($data2 = mysqli_fetch_assoc($result2)) {

        if (stripos($data2['Nom'], $search) !== false) {
            echo "<div style='border:1px solid #99d; padding:10px; margin-bottom:10px;'>";
            echo "<p><strong>Agent immobilier trouvé :</strong> " . htmlspecialchars($data2['Nom']) . "</p>";
            echo "</div>";
            $found = true;
        }
    }

    if (!$found) {
        echo "<p>Aucun résultat trouvé pour <strong>" . htmlspecialchars($search) . "</strong>.</p>";
    }
    

} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>
