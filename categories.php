<?php

require_once __DIR__.'../data/dataCategory.php';
include __DIR__.'/partials/header.php';
include __DIR__.'/partials/nav.php';

/**
 * Je dois afficher les catégories de plats ici 
 * puis les affichés dans ma page
 */

function displayCategory($categoriesData, $idCategory)
{
    $title = isset($categoriesData[$idCategory]['strCategory']) ? $categoriesData[$idCategory]['strCategory'] : 'Catégorie non trouvée';
}

?>

<section class="container">

    <h1 class="m-5">Liste des catégories</h1>
    <div class="row mt-5">
        <?php
        foreach ($categoriesData as $idCategory => $category) {
            echo '<div class="card m-2" style="width: 20rem;">';
            echo '  <img src="' . $category["strCategoryThumb"] . '" class="card-img-top" alt="...">';
            echo '  <div class="card-body">';
            echo "    <h5 class='card-title'>{$category['strCategory']}</h5>";
            echo '    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>';
            echo '    <a href="#" class="btn btn-primary">Go somewhere</a>';
            echo '  </div>';
            echo '</div>';
            
        }
        ?>
    </div>

</section>

<?php include __DIR__.'/partials/footer.php'; ?>
