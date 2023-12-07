<?php

$url = "https://www.themealdb.com/api/json/v1/1/categories.php";
$dataRecipeCategory = file_get_contents($url);

if ($dataRecipeCategory === false) {
    die("Une erreur s'est produite lors de la récupération des données depuis l'API");
}
$dataRecipeCategory = json_decode($dataRecipeCategory, true);
$categoriesData = $dataRecipeCategory['categories'];

?>