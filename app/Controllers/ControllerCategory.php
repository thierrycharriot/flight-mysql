<?php

//var_dump(__DIR__); die();

require_once __DIR__ . '/../Models/Category.php';

class ControllerCategory {    

    /**
     * List categories
     *
     * @return void
     */
    public function category_all() 
    {
        //echo '<h1>I am the categories page!</h1>';
        Flight::render('inc/head', array('title' => 'Categories page'));
        try {
			$categories = Category::all();
		} catch (\Exception $e){}
        Flight::render('category/category-all', array(
            'categories' => $categories
        ));
    }
    
    /**
     * Create category
     *
     * @return void
     */
    public function category_create() 
    {
        //echo '<h1>I am the create page!</h1>';
        Flight::render('inc/head', array('title' => 'Create category'));
        Flight::render('category/category-create', array (
        ));

        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //var_dump($name, $name); die(); // OK
        $category = new Category();

        if(!empty($name) & !empty($description)) {
            $category->setName($name);
            $category->setDescription($description);

            if($category->create()) {
                Flight::redirect('/category-all');
                exit;
            } else {
                print "DB insertion error!";
            }  
        }
    }

    /**
     * Read category
     *
     * @param [type] $id
     * @return void
     */
    public function category_read($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the category page!</h1>';
        Flight::render('inc/head', array('title' => 'Category ' . $id));
        try {
			$category = Category::read($id);
		} catch (\Exception $e){}
        Flight::render('category/category-read', array (
            'category' => $category
        ));
    }
        
    /**
     * Update category
     *
     * @param [type] $id
     * @return void
     */
    public function category_update($id) 
    {
        //var_dump($id); die(); // OK
        //echo '<h1>I am the category update page!</h1>';
        Flight::render('inc/head', array('title' => 'Update category ' . $id));
        try {
			$category = Category::read($id);
		} catch (\Exception $e){}
        Flight::render('category/category-update', array (
            'category' => $category
        ));

        /**
         * https://www.php.net/manual/fr/function.filter-input.php
         * filter_input — Récupère une variable externe et la filtre
         */
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //var_dump($name, $description, $id); die(); // OK
        $category = new Category();

        if(!empty($name) & !empty($description)) {
            $category->setName($name);
            $category->setDescription($description);

            if($category->update($id)) {
                Flight::redirect('/category-read/'. $id); 
                exit;
            } else {
                print "DB insertion error!";
            }  
        } 
    }

    /**
     * Delete category
     *
     * @param [type] $id
     * @return void
     */
    public function category_delete($id)
    {
        if(Category::delete($id)) {
            Flight::redirect('/category-all');
            exit;
        } else {
            print "DB deletion error!";
        }          
    }

}

$controller_category = new ControllerCategory();