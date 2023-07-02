<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($author); ?>

        <h1 class="center green-text">I am the author <?= $author->{'id_author'} ?> page!</h1>

        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Pseudo: <?= $author->{'pseudo'} ?></span>
                        <p>Firstname: <?= $author->{'firstname'} ?></p>
                        <p>Lastname: <?= $author->{'lastname'} ?></p>
                        <p>Email: <?= $author->{'mail'} ?></p>
                    </div>
                    <div class="card-action">
                        <a href="<?= Flight::get('base_url'); ?>/articles-author/<?= $author->{'id_author'} ?>">Articles</a>
                        <a href="<?= Flight::get('base_url'); ?>/author-update/<?= $author->{'id_author'} ?>">Editer</a>
                        <a href="<?= Flight::get('base_url'); ?>/author-delete/<?= $author->{'id_author'} ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ceci ?!`)">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>