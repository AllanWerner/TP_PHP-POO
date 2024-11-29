<?php

$headTitle = "Accueil";

ob_start();
?>

<section class="main-sections">
    <article class="main-articles">
        <h1 class="main-articles-title">
            Bienvenue sur Blog de Voyage
        </h1>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
            Deleniti asperiores at ratione aliquam beatae. Aliquam labore nobis ea fuga sint ratione architecto 
            assumenda alias corporis neque. Eligendi nostrum illo culpa rerum ab ipsa obcaecati, facere asperiores 
            commodi rem atque nisi molestiae officia omnis sequi earum provident soluta animi cupiditate itaque?
        </p>
    </article>
</section>

<?php
$mainContent = ob_get_clean();