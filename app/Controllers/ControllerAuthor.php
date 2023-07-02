<?php

//var_dump(__DIR__); die();

require_once __DIR__ . '/../Models/Author.php';

class ControllerAuthor {    

    /**
     * List authors
     *
     * @return void
     */
    public function authors_all() 
    {
        //echo '<h1>I am the authors page!</h1>';
        Flight::render('inc/head', array('title' => 'Authors page'));
        try {
			$authors = Author::all();
		} catch (\Exception $e){}
        Flight::render('author/author-all', array(
            'authors' => $authors
        ));
    }

    /**
     * Create author
     *
     * @return void
     */
    public function author_create() 
    {
        //echo '<h1>I am the create page!</h1>';
        Flight::render('inc/head', array('title' => 'Create author'));
        Flight::render('author/author-create', array (
        ));

        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $mail = filter_input(INPUT_POST, 'mail');
        //var_dump($firstname, $lastname, $pseudo, $mail); die(); // OK
        $author = new Author();

        if(!empty($firstname) & !empty($lastname) & !empty($pseudo) & !empty($mail)) {
            $author->setFirstname($firstname);
            $author->setLastname($lastname);
            $author->setPseudo($pseudo);
            $author->setMail($mail);

            if($author->create()) {
                Flight::redirect('/author-all');
                exit;
            } else {
                print "DB insertion error!";
            }  
        } 
    }
    
    /**
     * Read author
     *
     * @param [type] $id
     * @return void
     */
    public function author_read($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the author page!</h1>';
        Flight::render('inc/head', array('title' => 'Author ' . $id));
        try {
			$author = Author::read($id);
		} catch (\Exception $e){}
        Flight::render('author/author-read', array (
            'author' => $author
        ));
    }

    /**
     * Update author
     *
     * @param [type] $id
     * @return void
     */
    public function author_update($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the author update page!</h1>';
        Flight::render('inc/head', array('title' => 'Author ' . $id));
        try {
			$author = Author::read($id);
		} catch (\Exception $e){}
        Flight::render('author/author-update', array (
            'author' => $author
        ));
        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $mail = filter_input(INPUT_POST, 'mail');
        //var_dump($id, $firstname, $lastname, $pseudo, $mail); die(); // OK
        $author = new Author();

        if(!empty($firstname) & !empty($lastname) & !empty($pseudo) & !empty($mail)) {
            $author->setFirstname($firstname);
            $author->setLastname($lastname);
            $author->setPseudo($pseudo);
            $author->setMail($mail);

            if($author->update($id)) {
                Flight::redirect('/author-read/'. $id); 
                exit;
            } else {
                print "DB insertion error!";
            }  
        } 
    }

    /**
     * Delete author
     *
     * @param [type] $id
     * @return void
     */
    public function author_delete($id)
    {
        if(Author::delete($id)) {
            Flight::redirect('/author-all');
            exit;
        } else {
            print "DB deletion error!";
        }          
    }

}

$controller_author = new ControllerAuthor();