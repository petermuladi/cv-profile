<?php
abstract class DatabaseCon
{
    /**
     * DatabaseCon is a static class representing the database connection object.
     * It contains static methods to get a connection object, connect to the database,
     * and disconnect from the database. It uses the mysqli extension to connect to 
     * the database, and it throws an error if the connection or disconnection fails.
     */

    private static mysqli $connection;

    public static function getConnection(): mysqli
    {
        return self::$connection;
    }


    //Connection to Database
    public static function Connect()
    {
        global $cfg;
        $driver = new mysqli_driver();
        $driver->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

        try {

            self::$connection = new mysqli($cfg["dbhost"], $cfg["dbuser"], $cfg["password"], $cfg["dbname"]);
        } catch (Exception $th) {

            ErrorClass::errorAction("Adatbázis hiba! Sikertelen csatlakozás az adatbázissal!");
            exit;
        }
    }

    //Disconnect Database
    public static function Disconnect()
    {
        try {
            self::$connection->close();
        } catch (Exception $th) {

            ErrorClass::errorAction("Adatbázis hiba! Sikertelen kapcsolatbontás az adatbázissal!");
            exit;
        }
    }
}
