<?php

//var_dump(__DIR__); die();

require_once __DIR__ . '/../Models/Article.php';
require_once __DIR__ . '/../Models/Author.php';
require_once __DIR__ . '/../Models/Category.php';

class ControllerArticle {    

    /**
     * List articles
     *
     * @return void
     */
    public function articles_all() 
    {
        //echo '<h1>I am the articles page!</h1>';
        Flight::render('inc/head', array('title' => 'Articles page'));
        try {
			$articles = Article::all();
		} catch (\Exception $e){}
        Flight::render('article/article-all', array(
            'articles' => $articles
        ));
    }

    /**
     * Read articles for author
     *
     * @return void
     */
    public function articles_author($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the author page!</h1>';
        Flight::render('inc/head', array('title' => 'Author ' . $id));
        try {
			$articles = Article::author($id);
		} catch (\Exception $e){}
        Flight::render('article/articles-author', array (
            'articles' => $articles,
            'id_author' => $id
        ));
    }

    /**
     * Read articles for category
     *
     * @return void
     */
    public function articles_category($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the category page!</h1>';
        Flight::render('inc/head', array('title' => 'Author ' . $id));
        try {
			$articles = Article::category($id);
		} catch (\Exception $e){}
        Flight::render('article/articles-category', array (
            'articles' => $articles,
            'id_category' => $id
        ));
    }
    
    /**
     * Read article
     *
     * @return void
     */
    public function article_read($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the article page!</h1>';
        Flight::render('inc/head', array('title' => 'Article ' . $id));
        try {
			$article = Article::read($id);
		} catch (\Exception $e){}
        Flight::render('article/article-read', array (
            'article' => $article
        ));
    }

    /**
     * Create article
     *
     * @return void
     */
    public function article_create() 
    {
        //echo '<h1>I am the create page!</h1>';
        Flight::render('inc/head', array('title' => 'Create article'));
        try {
            $categories = Category::all();
            $authors = Author::all();
        } catch (\Exception $e){}
        Flight::render('article/article-create', array (
            'categories'    => $categories,
            'authors'       => $authors,           
        ));
        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_author = filter_input(INPUT_POST, 'author');
        $id_category = filter_input(INPUT_POST, 'category');
        //var_dump($title, $content, $id_author, $id_category); die(); // OK
        $article = new Article();

        if(!empty($title) & !empty($content)) {
            $article->setTitle($title);
            $article->setContent($content);
            $article->setId_author($id_author);
            $article->setId_category($id_category);

            if($article->create()) {
                Flight::redirect('/article-all');
                exit;
            } else {
                print "DB insertion error!";
            }  
        }
    }

    /**
     * Update article
     *
     * @param [type] $id
     * @return void
     */
    public function article_update($id) 
    {
        //echo '<h1>I am the update page!</h1>';
        Flight::render('inc/head', array('title' => 'Update article'));
        try {
            $article = Article::read($id);
            $categories = Category::all();
            $authors = Author::all();
        } catch (\Exception $e){}
        Flight::render('article/article-update', array (
            'article'       => $article,
            'authors'       => $authors,
            'categories'    => $categories           
        ));
        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_author = filter_input(INPUT_POST, 'author');
        $id_category = filter_input(INPUT_POST, 'category');
        //var_dump($id, $title, $content, $id_author, $id_category); die(); // OK
        $article = new Article();

        if(!empty($title) & !empty($content) & !empty($id_author) & !empty($id_category)) {
            $article->setTitle($title);
            $article->setContent($content);
            $article->setId_author($id_author);
            $article->setId_category($id_category);

            if($article->update($id)) {
                Flight::redirect('/article-read/'. $id); 
                exit;
            } else {
                print "DB insertion error!";
            }  
        }
    }

    /**
     * Delete article
     *
     * @param [type] $id
     * @return void
     */
    public function article_delete($id)
    {
        if(Article::delete($id)) {
            Flight::redirect('/article-all');
            exit;
        } else {
            print "DB deletion error!";
        }          
    }
}

$controller_article = new ControllerArticle();