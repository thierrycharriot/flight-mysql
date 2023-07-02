<?php

//var_dump(__DIR__); die();

require __DIR__ . '/../vendor/flight/Flight.php';

Flight::set('flight.log_errors', true);
Flight::set('flight.views.path', __DIR__ . '/../app/Views/');

/**
 * https://www.php.net/manual/fr/reserved.variables.server.php
 * $_SERVER — Variables de serveur et d'exécution
 */
$base_url = dirname($_SERVER['SCRIPT_NAME']);
// Save your variable
Flight::set('base_url', $base_url);

include 'kint.phar';
//d('Dumped with Kint');

require_once  __DIR__ . '/../app/Controllers/MainController.php';
require_once  __DIR__ . '/../app/Controllers/ControllerArticle.php';
require_once  __DIR__ . '/../app/Controllers/ControllerAuthor.php';
require_once  __DIR__ . '/../app/Controllers/ControllerCategory.php';

/*
Flight::route('/', function () {
    echo 'hello world!';
});
*/

Flight::route('GET /', [$main_controller, 'method_home']);

Flight::route('GET /about', [$main_controller, 'method_about']);

Flight::route('GET /contact', [$main_controller, 'method_contact']);


Flight::route('GET /article-all', [$controller_article, 'articles_all']);

Flight::route('GET /articles-author/@id', [$controller_article, 'articles_author']);

Flight::route('GET /articles-category/@id', [$controller_article, 'articles_category']);

Flight::route('GET|POST /article-create', [$controller_article, 'article_create']);

Flight::route('GET /article-read/@id', [$controller_article, 'article_read']);

Flight::route('GET|POST /article-update/@id', [$controller_article, 'article_update']);

Flight::route('GET /article-delete/@id', [$controller_article, 'article_delete']);


Flight::route('GET /author-all', [$controller_author, 'authors_all']);

Flight::route('GET|POST /author-create', [$controller_author, 'author_create']);

Flight::route('GET /author-read/@id', [$controller_author, 'author_read']);

Flight::route('GET|POST /author-update/@id', [$controller_author, 'author_update']);

Flight::route('GET /author-delete/@id', [$controller_author, 'author_delete']);


Flight::route('GET /category-all', [$controller_category, 'category_all']);

Flight::route('GET|POST /category-create', [$controller_category, 'category_create']);

Flight::route('GET /category-read/@id', [$controller_category, 'category_read']);

Flight::route('GET|POST /category-update/@id', [$controller_category, 'category_update']);

Flight::route('GET /category-delete/@id', [$controller_category, 'category_delete']);


Flight::start();
