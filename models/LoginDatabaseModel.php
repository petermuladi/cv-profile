<?php
/**
 * LoginDatabaseModel handles database operations related to user login.
 */
abstract class LoginDatabaseModel
{
   /**
    * Attempts to log in a user with the given email and password.
    *
    * @param mixed $mail The user's email address.
    * @param mixed $password The user's password.
    * @return int|false The user ID if login is successful, false otherwise.
    */
   public static function login(mixed $mail, mixed $password)
   {
      try {
         $con = DatabaseCon::getConnection();

         $res = $con->query("SELECT * FROM `felhasznalo`
         WHERE `email` ='" . $con->real_escape_string($mail) . "'
         AND `jelszo` ='" . $con->real_escape_string($password) . "' ");

         $returnResult = $res->fetch_assoc();
         $userId = $returnResult['id'];
         $res->free_result();

         return $userId;
      } catch (Exception $th) {
         ErrorClass::errorAction("Adatbázis hiba! Sikertelen bejelentkezés!");
         exit;
      }
      return false;
   }
}