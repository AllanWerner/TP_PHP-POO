<?php
  $headTitle = "Liste des articles";

  if(!isset($articlesList) || !$articlesList){
    $mainContent = "Erreur 404";
    exit;
  }

  ob_start();
?>

<section class="main-sections">
  <h1 class="main-sections-title">Liste des articles</h1>
  <?php foreach($articlesList as $article): ?>
    <article class="main-articles">
      <h2 class="main-articles-title"><?= $article->Title ?> - Par <?= $article->Author ?></h2>
      <p>
        <?= $article->Content ?>
      </p>
      <a href="/articles/update/<?= $article->ID ?>" class="cta-links">
        Mettre à jour l'article
      </a>
      <form action="/articles/delete" method="POST">
        <input type="hidden" name="ID" value="<?= $article->ID ?>" required />
        <button type="submit" class="cta-links"> Supprimer </button>
      </form>
    </article>
  <?php endforeach; ?>
</section>

<?php 
$mainContent = ob_get_clean();