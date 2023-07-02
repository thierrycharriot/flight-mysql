<?php

require_once __DIR__ . '/../Utils/Database.php';

/**
 * Undocumented class
 */
class Article {

    private $id;
    private $title;
    private $content;
    private $author;
    private $id_author;
    private $id_category;
    private $created_at;    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of id_author
     */ 
    public function getId_author()
    {
        return $this->id_author;
    }

    /**
     * Set the value of id_author
     *
     * @return  self
     */ 
    public function setId_author($id_author)
    {
        $this->id_author = $id_author;

        return $this;
    }

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Select article x 3
     *
     * @return void
     */
    public static function read_limit()
    {
        Database::connect();
        $db = Flight::db();
        $sql = 'SELECT * FROM `articles` ORDER BY `title` DESC LIMIT 3';
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetchall.php
         * PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats 
         */
        $articles = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($articles); die(); // OK
        return $articles;
    }

    /**
     * All articles
     *
     * @return void
     */
    public static function all()
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `articles` ORDER BY title DESC';
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetchall.php
         * PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats 
         */
        $articles = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($articles); die() // OK
        return $articles;

        $db = null;
    } 

    /**
     * Select articles for author
     *
     * @param [type] $id
     * @return void
     */
    public static function author($id)
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `articles` WHERE `id_author` = ' . $id;
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetch
         * PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
         */
        $articles = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($articles); die()/; / OK
        return $articles;

        $db = null;
    }

    /**
     * Select articles for category
     *
     * @param [type] $id
     * @return void
     */
    public static function category($id)
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `articles` WHERE `id_category` = ' . $id;
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetch
         * PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
         */
        $articles = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($articles); die(); // OK
        return $articles;
    }

    /**
     * Create article
     *
     * @return void
     */
    public function create()
    {
        Database::connect();
        $db = Flight::db(); 
    
        /**
         * https://www.php.net/manual/fr/pdo.prepare.php
         * PDO::prepare — Prépare une requête à l'exécution et retourne un objet 
         */
        $prep = $db->prepare("
            INSERT INTO articles
            (
                title, 
                content, 
                id_author, 
                id_category
            ) VALUES
            (
                :title, 
                :content, 
                :id_author, 
                :id_category
            )");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':title', $this->title, PDO::PARAM_STR);
        $prep->bindValue(':content', $this->content, PDO::PARAM_STR);
        $prep->bindValue(':id_author', $this->id_author, PDO::PARAM_STR);
        $prep->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);

        if ($prep->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Read article
     *
     * @param [type] $id
     * @return void
     */
    public static function read($id)
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `articles` WHERE `id_article` = ' . $id;
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetch
         * PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
         */
        $article = $pdoStatement->fetch(PDO::FETCH_OBJ);
        //var_dump($article); die(); // OK
        return $article;

        $db = null;
    }

    /**
     * Update article
     *
     * @param [type] $id
     * @return void
     */
    public function update($id)
    {
        Database::connect();
        $db = Flight::db();
    
        /**
         * https://www.php.net/manual/fr/pdo.prepare.php
         * PDO::prepare — Prépare une requête à l'exécution et retourne un objet 
         */
        $prep = $db->prepare("
            UPDATE `articles`
            SET
                title = :title,
                content = :content, 
                id_author = :id_author,
                id_category = :id_category,
                created_at = NOW()
            WHERE id_article = :id
            ");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':title', $this->title, PDO::PARAM_STR);
        $prep->bindValue(':content', $this->content, PDO::PARAM_STR);
        $prep->bindValue(':id_author', $this->id_author, PDO::PARAM_STR);
        $prep->bindValue(':id_category', $this->id_category, PDO::PARAM_STR);
        $prep->bindValue(':id', (int)$id);
        //var_dump($this->title, $this->content, $this->id_author, $this->id_category, $id); die();
        
        if ($prep->execute()) {
            return true;
        }
    
        return false;
    }

    /**
     * Delete article
     *
     * @param [type] $id
     * @return void
     */
    public static function delete($id)
    {
        Database::connect();
        $db = Flight::db();

        $prep = $db->prepare("
            DELETE FROM `articles`
            WHERE id_article = :id_article
        ");
        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         */
        $prep->bindValue(':id_article', $id);

        if ($prep->execute()) {
            return true;
        }
        return false;    
    }


}