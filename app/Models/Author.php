<?php

require_once __DIR__ . '/../Utils/Database.php';

/**
 * Undocumented class
 */

class Author {

    private $id;
    private $firstname;
    private $lastname;
    private $pseudo;
    private $mail;
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * All authors
     *
     * @return void
     */
    public static function all()
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `authors`';
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetchall.php
         * PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats 
         */
        $authors = $pdoStatement->fetchAll(PDO::FETCH_OBJ);
        //var_dump($authors); die(); // OK
        return $authors;

        $db = null;
    } 

    /**
     * Create author
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
            INSERT INTO authors
            (
                firstname, 
                lastname, 
                pseudo, 
                mail
            ) VALUES
            (
                :firstname, 
                :lastname, 
                :pseudo, 
                :mail
            )");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $prep->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $prep->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $prep->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        if ($prep->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Read author
     *
     * @param [type] $id
     * @return void
     */
    public static function read($id)
    {
        Database::connect();
        $db = Flight::db();

        $sql = 'SELECT * FROM `authors` WHERE `id_author` = ' . $id;
        $pdoStatement = $db->query($sql);
        /**
         * https://www.php.net/manual/fr/pdostatement.fetch
         * PDOStatement::fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
         */
        $author = $pdoStatement->fetch(PDO::FETCH_OBJ);
        //var_dump($author); die(); // OK
        return $author;

        $db = null;
    }

    /**
     * Update author
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
            UPDATE `authors`
            SET
                firstname = :firstname,
                lastname = :lastname, 
                pseudo = :pseudo,
                mail = :mail
            WHERE id_author = :id
            ");

        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         * 
         * https://www.php.net/manual/fr/pdo.constants.php
         * Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL. 
         */
        $prep->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $prep->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $prep->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $prep->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $prep->bindValue(':id', (int)$id);
        //dump($this->firstname, $this->lastname, $this->pseudo, $this->mail, $id);
        
        if ($prep->execute()) {
            return true;
        }        
        return false;
    }

    /**
     * Delete author
     *
     * @param [type] $id
     * @return void
     */
    public static function delete($id)
    {
        Database::connect();
        $db = Flight::db();

        $prep = $db->prepare("
            DELETE FROM `authors`
            WHERE id_author = :id_author
        ");
        /**
         * https://www.php.net/manual/fr/pdostatement.bindvalue.php
         * PDOStatement::bindValue — Associe une valeur à un paramètre 
         */
        $prep->bindValue(':id_author', $id);

        if ($prep->execute()) {
            return true;
        }
        return false;    
    }

}