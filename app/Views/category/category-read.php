<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($category); ?>

        <h1 class="center green-text">I am the category page!</h1>

        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"><?= $category->{'name'} ?></span>
                        <p><?= $category->{'description'} ?></p>
                    </div>
                    <div class="card-action">
                        <a href="<?= Flight::get('base_url'); ?>/articles-category/<?= $category->{'id_category'} ?>">Articles</a>
                        <a href="<?= Flight::get('base_url'); ?>/category-update/<?= $category->{'id_category'} ?>">Update</a>
                        <a href="<?= Flight::get('base_url'); ?>/category-delete/<?= $category->{'id_category'} ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ceci ?!`)">Delete</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>