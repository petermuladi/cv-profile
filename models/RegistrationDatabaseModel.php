<?php
/*
Inserts a new user registration data into the database
@param array $data - the user registration data
@return int - the ID of the inserted user
*/
abstract class RegistrationDatabaseModel
{
   public static function Registration(array $data)
   {
      $con = DatabaseCon::getConnection();

      $con->query(
         "INSERT INTO 
         `felhasznalo` 
         (email,jelszo,teljes_nev,szuletesi_hely,szuletesi_datum)
         VALUES
         ('"
            . $con->real_escape_string($data["email"]) . " ','"
            . $con->real_escape_string($data["jelszo"]) . " ','"
            . $con->real_escape_string($data["teljes_nev"]) . " ','"
            . $con->real_escape_string($data["szuletesi_hely"]) . " ','"
            . $con->real_escape_string($data["szuletesi_datum"]) .
            "')"
      );

      //visszatérünk az id-val hogy session-be le tudjuk menteni.
      $id = $con->insert_id;

      //zár...
      //$con->close();

      return $id;
   }
}
