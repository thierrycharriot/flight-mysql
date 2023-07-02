<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php //d($category); ?>

        <h1 class="center green-text">I am the category update page!</h1>

        <div class="row">
            <form class="col s12" action="" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate" value="<?= $category->{'name'} ?>">
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="description" name="description" class="materialize-textarea"><?= $category->{'description'} ?></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </form>
        </div>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>