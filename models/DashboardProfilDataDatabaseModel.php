<?php 
// This class is an abstract model for handling profile data in the database
abstract class DashboardProfilDataDatabaseModel
{

   // This method updates the profile data for the given user id with the provided data
   public static function UpdateProfileData(array $data, int $id)
   {
      try {
         // Get a database connection
         $con = DatabaseCon::getConnection();

         // Sanitize input data to prevent SQL injection
         $user_id = $con->real_escape_string($id);
         $teljes_nev = $con->real_escape_string($data["full-name"]);
         $email = $con->real_escape_string($data["email"]);
         $szuletesi_hely = $con->real_escape_string($data["birth-place"]);
         $szuletesi_datum = $con->real_escape_string($data["birth-date"]);
         $allampolgarsag = $con->real_escape_string($data["citizenship"]);
         $bemutatkozas = $con->real_escape_string($data["introduction"]);
         $hobbik = $con->real_escape_string($data["hobbies"]);
         $telefonszamok = $con->real_escape_string($data["phone-numbers"]);

         // Construct the SQL query to update the user's profile data
         $query = "UPDATE `felhasznalo` 
         SET 
         email=?,
         teljes_nev=?,
         szuletesi_hely=?,
         szuletesi_datum=?,
         allampolgarsag=?,
         bemutatkozas=?,
         hobbik=?,
         telefonszamok=?
         WHERE 
         id=$user_id";

         // Prepare the statement and bind the sanitized input data to the query parameters
         $stmt = $con->prepare($query);
         $stmt->bind_param(
            "ssssssss",
            $email,
            $teljes_nev,
            $szuletesi_hely,
            $szuletesi_datum,
            $allampolgarsag,
            $bemutatkozas,
            $hobbik,
            $telefonszamok
         );

         // Execute the query and close the statement
         $stmt->execute();
         $stmt->close();
         return true;

      } catch (Exception $th) {
         // If an error occurs, log the error and unset any relevant session variables
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! A Profil adatok frissítése sikertelen!", $th);
         exit;
      }
   }
}