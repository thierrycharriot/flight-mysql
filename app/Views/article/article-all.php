<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($articles); ?>

        <h1 class="center green-text">I am the articles page!</h1>

        <?php if($articles) { ?>
            <?php foreach ($articles as $key => $article) : ?>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card ">
                            <div class="card-content">
                                <span class="card-title"><?= $article->{'title'} ?></span>
                                <p><?= substr($article->{'content'}, 0, 120) ?>***</p>
                                <p>Date: <?= $article->{'created_at'} ?></p>
                            </div>
                            <div class="card-action">
                                <a href="<?= Flight::get('base_url'); ?>/article-read/<?= $article->{'id_article'} ?>">Read more &#x21D2;</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php }  
            else {
                echo('<h2>Create database or article!</h2>');
            }            
        ?>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>