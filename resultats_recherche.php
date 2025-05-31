<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['search']) || trim($_POST['search']) === '') {
    return;
}

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found  = mysqli_select_db($db_handle, $database);

$search = isset($_POST["search"]) ? $_POST["search"] : "";

if ($db_found) {

    $sql = "SELECT * FROM bien_immobilier";
    $sql2 = "SELECT agent_immobilier.Nom, Specialite FROM agent_immobilier";
    
    $result = mysqli_query($db_handle, $sql);
    $result2 = mysqli_query($db_handle, $sql2);

    $found = false;

    echo "<h2>Résultats de la recherche : </h2>";

    while ($data = mysqli_fetch_assoc($result)) {
        if (stripos($data['ID'], $search) !== false || stripos($data['Ville'], $search) !== false) {

            $photo = htmlspecialchars($data['Photo']);
            $categorie = htmlspecialchars($data['Categorie']);
            $id = htmlspecialchars($data['ID']);
            $superficie = htmlspecialchars($data['Superficie']);
            $prix = htmlspecialchars($data['Prix']);
            $description = htmlspecialchars($data['Description']);
            $adresse = htmlspecialchars($data['Adresse']);
            $ville = htmlspecialchars($data['Ville']);

            echo '<div class="bien-toutParcourir">';
            echo "<img src=\"$photo\" id=\"images-biens-scrollables\" alt=\"Photo bien\" width=\"300\" height=\"200\">";
            echo "<p><strong>$categorie - $id</strong></p>";
            echo "<p>$superficie m² - $prix</p>";
            echo "<p>$description</p>";
            echo "<p>$adresse $ville</p>";
            echo '</div>';
            $found = true;
        }
    }

    while ($data2 = mysqli_fetch_assoc($result2)) {
        if (stripos($data2['Nom'], $search) !== false) {
            $nom = htmlspecialchars($data2['Nom']);
            $specialite = htmlspecialchars($data2['Specialite']);

            echo "<div style='border:1px solid #99d; padding:10px; margin-bottom:10px;'>";
            echo "<p><strong>Agent immobilier trouvé :</strong> $nom</p>";
            echo "<p><strong>Spécialité :</strong> $specialite</p>";

            $sql_biens = "SELECT * FROM bien_immobilier WHERE Categorie = '" . mysqli_real_escape_string($db_handle, $data2['Specialite']) . "'";
            $result_biens = mysqli_query($db_handle, $sql_biens);

            while ($bien = mysqli_fetch_assoc($result_biens)) {
                $photo = htmlspecialchars($bien['Photo']);
                $categorie = htmlspecialchars($bien['Categorie']);
                $id = htmlspecialchars($bien['ID']);
                $superficie = htmlspecialchars($bien['Superficie']);
                $prix = htmlspecialchars($bien['Prix']);
                $description = htmlspecialchars($bien['Description']);
                $adresse = htmlspecialchars($bien['Adresse']);
                $ville = htmlspecialchars($bien['Ville']);

                echo '<div class="bien-toutParcourir">';
                echo "<img src=\"$photo\" id=\"images-biens-scrollables\" alt=\"Photo bien\" width=\"300\" height=\"200\">";
                echo "<p><strong>$categorie - $id</strong></p>";
                echo "<p>$superficie m² - $prix</p>";
                echo "<p>$description</p>";
                echo "<p>$adresse $ville</p>";
                echo '</div>';
            }

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
