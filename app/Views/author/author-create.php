<?php
require Flight::get('flight.views.path') . '/inc/nav.php';
?>

<div class="container major">
    <section class="section">

        <h1 class="center green-text">I am the author create page!</h1>

        <div class="row">
            <div class="col s12 m12">
                <div class="card">

                    <form class="col s12" action="" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="firstname" name="firstname" type="text" class="validate">
                                <label for="firstname">FirstName</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="lastname" name="lastname" type="text" class="validate">
                                <label for="lastname">LastName</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="pseudo" name="pseudo" type="text" class="validate">
                                <label for="pseudo">Pseudo</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="mail" name="mail" type="text" class="validate">
                                <label for="mail">Mail</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </section><!-- section -->
</div><!-- container -->

<?php
require Flight::get('flight.views.path') . '/inc/footer.php';
?>