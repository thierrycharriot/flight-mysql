<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <?php
        //d($authors); 
        //d($categories);
        ?>

        <h1 class="center green-text">I am the article create page!</h1>

        <?php if($authors && $categories) { ?>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card">

                        <form class="col s12" action="" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title" name="title" type="text" class="validate">
                                    <label for="title">Title</label>
                                </div>

                                <div class="input-field col s12">
                                    <textarea id="content" name="content" class="materialize-textarea"></textarea>
                                    <label for="content">Content</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="author">
                                        <option value="" disabled selected>Choose your author</option>
                                        <?php foreach ($authors as $key => $author) : ?>
                                            <option value="<?= $author->{'id_author'} ?>"><?= $author->{'pseudo'} ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="input-field col s12">
                                    <select name="category">
                                        <option value="" disabled selected>Choose your category</option>
                                        <?php foreach ($categories as $key => $category) : ?>
                                            <option value="<?= $category->{'id_category'} ?>"><?= $category->{'name'} ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                        </form>

                    </div>
                </div>
            </div><!-- row -->
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