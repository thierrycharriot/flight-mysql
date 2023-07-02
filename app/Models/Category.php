<?php

require_once __DIR__ . '/../Utils/Database.php';

/**
 * Undocumented class
 */
class Category {

    private $id;
    private $name;
    private $description;    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * All categories
     *
     * @return void
     */
    public static function all()
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `categories`';
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetchall.php
         * PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats 
         */
        $categories = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($categories); die(); // OK
        return $categories;

        $db = null;
    } 

    /**
     * Create category
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
            INSERT INTO categories
            (
                name, 
                description
            ) VALUES
            (
                :name, 
                :description
            )");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':name', $this->name, PDO::PARAM_STR);
        $prep->bindValue(':description', $this->description, PDO::PARAM_STR);

        if ($prep->execute()) {
            return true;
        }
        return false;
    }
    
    /**
     * Read category
     *
     * @param [type] $id
     * @return void
     */
    public static function read($id)
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `categories` WHERE `id_category` = ' . $id;
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetch
         * PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
         */
        $category = $pdoStatement->fetch(PDO::FETCH_OBJ);
        //var_dump($category); die(); // OK
        return $category;

        $db = null;
    }
    
    /**
     * Update category
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
            UPDATE `categories`
            SET
                name = :name,
                description = :description 
            WHERE id_category = :id
            ");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':name', $this->name, PDO::PARAM_STR);
        $prep->bindValue(':description', $this->description, PDO::PARAM_STR);
        $prep->bindValue(':id', (int)$id);
        //var_dump($this->name, $this->description, $id); die(); 
        
        if ($prep->execute()) {
            return true;
        }       
        return false;
    }


    /**
     * Delete category
     *
     * @param [type] $id
     * @return void
     */
    public static function delete($id)
    {
        Database::connect();
        $db = Flight::db();

        $prep = $db->prepare("
            DELETE FROM `categories`
            WHERE id_category = :id_category
        ");
        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         */
        $prep->bindValue(':id_category', $id);

        if ($prep->execute()) {
            return true;
        }
        return false;    
    }

}
