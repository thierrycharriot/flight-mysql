<nav class="light-blue darken-3" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="<?= Flight::get('base_url'); ?>/" class="brand-logo">Flight - Blog</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?= Flight::get('base_url'); ?>/about">About</a></li>
            <li><a href="<?= Flight::get('base_url'); ?>/contact">Contact</a></li>
            <li><a class="dropdown-trigger" data-target="dropdown-articles" href="">Articles</a></li>
            <li><a class="dropdown-trigger" data-target="dropdown-authors" href="">Authors</a></li>
            <li><a class="dropdown-trigger" data-target="dropdown-categories" href="">Categories</a></li>
        </ul>

        <ul id="dropdown-articles" class="dropdown-content">
            <li><a href="<?= Flight::get('base_url'); ?>/article-all">Articles list</a></li>
            <li><a href="<?= Flight::get('base_url'); ?>/article-create">Article create</a></li>
        </ul>

        <ul id="dropdown-authors" class="dropdown-content">
            <li><a href="<?= Flight::get('base_url'); ?>/author-all">Authors list</a></li>
            <li><a href="<?= Flight::get('base_url'); ?>/author-create">Author create</a></li>
        </ul>


        <ul id="dropdown-categories" class="dropdown-content">
            <li><a href="<?= Flight::get('base_url'); ?>/category-all">Categories list</a></li>
            <li><a href="<?= Flight::get('base_url'); ?>/category-create">Category create</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a href="<?= Flight::get('base_url'); ?>/about">About</a></li>
            <li><a href="<?= Flight::get('base_url'); ?>/contact">Contact</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>

