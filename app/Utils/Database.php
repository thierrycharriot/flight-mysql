<?php

/**
 * Undocumented class
 */
class Database
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function connect()
    {

        // Register class with constructor parameters
        // The callback will be passed the object that was constructed
        Flight::register(
            'db',
            'PDO',
            array('mysql:host=127.0.0.1;dbname=flight-blog', 'root', ''),
            function ($db) {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        );

        // Get an instance of your class
        // This will create an object with the defined parameters
        //
        //     new PDO('mysql:host=localhost;dbname=test','user','pass');
        //
        //$db = Flight::db();

    }
}
