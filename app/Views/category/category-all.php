<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($categories); ?>

        <h1 class="center green-text">I am the categories page!</h1>


        <?php if($categories) { ?>
            <?php foreach ($categories as $key => $category) : ?>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card ">
                            <div class="card-content">
                                <span class="card-title"><?= $category->{'name'} ?></span>
                            </div>
                            <div class="card-action">
                                <a href="<?= Flight::get('base_url'); ?>/category-read/<?= $category->{'id_category'} ?>">Read more &#x21D2;</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php }  
            else {
                echo('<h2>Create database or category!</h2>');
            }            
        ?>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>