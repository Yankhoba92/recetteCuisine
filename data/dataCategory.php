<?php

$url = "https://www.themealdb.com/api/json/v1/1/categories.php";
$dataRecipe = file_get_contents($url);

if ($dataRecipe === false) {
    die("Une erreur s'est produite lors de la récupération des données depuis l'API");
}


$dataRecipe = json_decode($dataRecipe, true);
$categoriesData = $dataRecipe['categories'];

?>