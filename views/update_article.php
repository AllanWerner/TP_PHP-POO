<?php

$headTitle = "Mise à jour d'un article";

if(!isset($article) || !$article){
    header("Location: /418");
    exit;
}
ob_start();
?>

<section class="main-sections">
    <article class="main-articles">
        <h1 class="main-articles-title">
            <?= $headTitle ?>
        </h1>

        <form action="/articles/update" method="POST">
            <label for="title">Titre de l'article</label>
            <input type="text" id="title" name="title" value="<?= $article->Title ?>"  required/>
            <label for="author">Auteur de l'article</label>
            <input type="author" id="author" name="author" value="<?= $article->Author ?>" required />
            <label for="content">Contenu de l'article</label>
            <textarea id="content" name="content"  required><?= $article->Content ?></textarea>

            <input type="hidden" value="<?= $article->ID ?>" name="id" required />
            <input type="hidden" value="<?= $article->Created_date ?>" name="created_date" required />

            <button type="submit" class="cta-btns">Modifier</button>
            
        </form>
    </article>
</section>

<?php
$mainContent = ob_get_clean();