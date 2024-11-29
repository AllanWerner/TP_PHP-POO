<?php

$headTitle = "Création d'un article";

ob_start();
?>

<section class="main-sections">
    <article class="main-articles">
        <h1 class="main-articles-title">
            <?= $headTitle ?>
        </h1>

        <form action="/articles/add" method="POST">
            <label for="title">Titre de l'article</label>
            <input type="text" id="title" name="title" />
            <label for="author">Auteur de l'article</label>
            <input type="author" id="author" name="author" />
            <label for="content">Contenu de l'article</label>
            <textarea id="content" name="content"></textarea>

            <button type="submit" class="cta-btns">Créer</button>
            
        </form>
    </article>
</section>

<?php
$mainContent = ob_get_clean();