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
    $filteredMeals = array_filter($meals, function($meal) use ($recherche) {
        return stripos($meal['strMeal'], $recherche) !== false;
    });

    // Afficher les résultats de la recherche
    if (!empty($filteredMeals)) {
       echo' <section class="container">';
       
        foreach ($filteredMeals as $meal) {
            echo " <h1 class=' text-center m-5'>{$meal['strMeal']}</h1>";
            echo '<div class="card mb-3" style="max-width: 8000px;">';
            echo    '<div class="row g-0">';
            echo        '<div class="col-md-4">';
            echo            '<img src="' . $meal['strMealThumb'] . '" alt="' . $meal['strMeal'] . '" class="img-fluid rounded-start" alt="...">';
            echo        '</div>';
            echo        '<div class="col-md-8">';
            echo            '<div class="card-body">';
            echo                "<h5 class='card-title'>{$meal['strMeal']}</h5>";
            echo                "<p class='card-text'>{$meal['strInstructions']}</p>";
            echo            '</div>';
            echo        '</div>';
            echo    '</div>';
            echo '</div>';
        }
        echo '<h2> Liste des ingredients</h2>';

        echo '<ul  class="list-group list-group-vertical">';

        foreach ($filteredMeals as $meal) {
            echo "<li class='list-group-item'>{$meal['strIngredient1']}</li>";
            echo "<li class='list-group-item'>{$meal['strIngredient2']}</li>";
            echo "<li class='list-group-item'>{$meal['strIngredient3']}</li>";
            echo "<li class='list-group-item'>{$meal['strIngredient4']}</li>";
            echo "<li class='list-group-item'>{$meal['strIngredient5']}</li>";
        }
        echo' </ul>';
        echo' </section>';

    } else {
        echo 'Aucun plat trouvé.';
    }
} else {
    echo "<p>Aucune recherche effectuée.</p>";
}

include __DIR__.'/partials/footer.php';


            
?>

