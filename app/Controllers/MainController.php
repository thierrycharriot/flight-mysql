<?php

//var_dump(__DIR__); die();

require_once __DIR__ . '/../Models/Article.php';

class MainController {

    /**
     * Undocumented function
     *
     * @return void
     */
    public function method_404() 
    {
        echo '<h1>I am the 404 page!</h1>';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function method_about() 
    {
        //echo '<h1>I am the about page!</h1>';
        Flight::render('inc/head', array('title' => 'About page'));
        Flight::render('about', array (
        ));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function method_home() 
    {
        //echo '<h1>I am the home page!</h1>';
        Flight::render('inc/head', array('title' => 'Home page'));
        try {
			$articles = Article::read_limit();
		} catch (\Exception $e){}
        Flight::render('home', array(
            'articles' => $articles
        ));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function method_contact() 
    {
        //echo '<h1>I am the contact page!</h1>';
        Flight::render('inc/head', array('title' => 'Contact page'));
        Flight::render('contact');
    }

}

$main_controller = new MainController();