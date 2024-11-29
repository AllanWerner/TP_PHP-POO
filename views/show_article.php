<?php

    if(!isset($article) || !$article){
        $mainContent = "Erreur 404";
        exit;
    }
    $headTitle = $article->Title;
?>

<section class="main-sections">
    <article class="main-articles">
        <h1 class="main-articles-title">
            <?= $article->Title?>  - Par <?= $article->Author ?>
        </h1>
        <p>
            <?= $article->Content ?>
        </p>
    </article>

</section>

<?php
$mainContent = ob_get_clean();