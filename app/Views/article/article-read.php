<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($article); ?>

        <h1 class="center green-text">I am the article <?= $article->{'id_article'} ?> page!</h1>

        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"><?= $article->{'title'} ?></span>
                        <p><?= $article->{'content'} ?></p>
                        <p>Date: <?= $article->{'created_at'} ?></p>
                    </div>
                    <div class="card-action">
                        <a href="<?= Flight::get('base_url'); ?>/articles-author/<?= $article->{'id_author'} ?>">Author <?= $article->{'id_author'} ?></a>
                        <a href="<?= Flight::get('base_url'); ?>/articles-category/<?= $article->{'id_category'} ?>">Category <?= $article->{'id_category'} ?></a>
                        <a href="<?= Flight::get('base_url'); ?>/article-update/<?= $article->{'id_article'} ?>">Editer</a>
                        <a href="<?= Flight::get('base_url'); ?>/article-delete/<?= $article->{'id_article'} ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ceci ?!`)">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>