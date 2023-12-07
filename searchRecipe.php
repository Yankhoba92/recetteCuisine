<?php

require_once __DIR__.'../data/dataCategory.php';
include __DIR__.'/partials/header.php';
include __DIR__.'/partials/nav.php';

if (isset($_POST['recipe'])) {
    $recherche = htmlspecialchars($_POST['recipe']);

    $url = "https://www.themealdb.com/api/json/v1/1/search.php?s=".$recherche;
    $dataRecipe = file_get_contents($url);

    if ($dataRecipe === false) {
        die("Une erreur s'est produite lors de la récupération des données depuis l'API");
    }

    $dataRecipe = json_decode($dataRecipe, true);

    $meals = $dataRecipe['meals'];

    echo "<p>Résultats de recherche pour : $recherche</p>";

    $filteredMeals = array_filter($meals, function($meal) use ($recherche) {
        return stripos($meal['strMeal'], $recherche) !== false;
    });

    // Afficher les résultats de la recherche
    if (!empty($filteredMeals)) {
        echo '<ul>';
        foreach ($filteredMeals as $meal) {
            echo '<li>';
            echo '<strong>Nom du plat:</strong> ' . $meal['strMeal'] . '<br>';
            echo '<strong>Image:</strong> <img src="' . $meal['strMealThumb'] . '" alt="' . $meal['strMeal'] . '"><br>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Aucun plat trouvé.';
    }
} else {
    echo "<p>Aucune recherche effectuée.</p>";
}

include __DIR__.'/partials/footer.php';
?>
