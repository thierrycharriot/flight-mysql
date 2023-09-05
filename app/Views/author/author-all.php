<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($authors); ?>

        <h1 class="center green-text">I am the authors page!</h1>

        <?php if($authors) { ?>
            <?php foreach ($authors as $key => $author) : ?>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card ">
                            <div class="card-content">
                                <span class="card-title">Pseudo: <?= $author->{'pseudo'} ?></span>
                            </div>
                            <div class="card-action">
                                <a href="<?= Flight::get('base_url'); ?>/author-read/<?= $author->{'id_author'} ?>">Read more &#x21D2;</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        <?php }  
            else {
                echo('<h2>Create database or author!</h2>');
            }            
        ?>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>