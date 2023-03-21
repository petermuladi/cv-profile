<?php 
// This is an abstract class for managing image database operations.
// The class has three static functions for saving all images, 
//deleting primary image and deleting secondary images.
abstract class ImageDatabaseModel
{
   // Save all images to database for a given user ID and an array of image data
   // Returns true if all images are saved successfully, false otherwise
   public static function SaveAllImages(int $id, array $imgsData): bool
   {

      try {
         $con = DatabaseCon::getConnection();
         $user_id = $con->real_escape_string($id);
         $success = true;


         for ($i = 0; $i < count($imgsData); $i++) {

            $eleresiUt = $con->real_escape_string($imgsData[$i]["eleresi-ut"]);
            $cim = $con->real_escape_string($imgsData[$i]["cim"]);
            $fokep = $con->real_escape_string($imgsData[$i]["fokep"]);
            if ($imgsData[$i]["fokep"] == 1 && $imgsData[$i]["eleresi-ut"] != "") {

               $query = "INSERT INTO `kepek` (felhasznalo_id,eleresi_ut,cim,fokep)
               VALUES ('$user_id','$eleresiUt','$cim','$fokep')";

               if (!$con->query($query)) {
                  $success = false;
               }
            }

            elseif ($imgsData[$i]["fokep"] == 0 && $imgsData[$i]["eleresi-ut"] != "") {

               $query = "INSERT INTO `kepek` (felhasznalo_id,eleresi_ut,cim,fokep)
               VALUES ('$user_id','$eleresiUt','$cim','$fokep')";

               if (!$con->query($query)) {
                  $success = false;
               };
            }
         }

         return $success;
      } catch (Exception $th) {
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! A kép mentése sikertelen!");
         exit;
      }
   }

   // Delete primary image for a given user ID
   // Returns true if the primary image is deleted successfully, false otherwise
   public static function DeletePrimaryImage(int $id): bool
   {

      try {
         $con = DatabaseCon::getConnection();
         $userid = $con->real_escape_string($id);
         $query = "SELECT * FROM `kepek` WHERE `felhasznalo_id`='$userid' AND `fokep`= 1";
         $res = $con->query($query);
         $result = $res->fetch_all(MYSQLI_ASSOC);

         if (count($result) > 0) {

            $deleteQuery = "DELETE FROM `kepek` WHERE `felhasznalo_id`=$userid AND `fokep`= 1 ";
            $con->query($deleteQuery);


            $filepath = $result[0]["eleresi_ut"];

            if (file_exists($filepath)) {
               unlink($filepath);
            }

            return true;
         }

         return false;
      } catch (Exception $th) {
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! Az elsődleges kép frissítése sikertelen!");
         exit;
      }
   }

   // Delete all secondary images for a given user ID
   // Returns true if all secondary images are deleted successfully, false otherwise
   public static function DeleteSecondaryImages(int $id): bool
   {

      try {
         $con = DatabaseCon::getConnection();
         $userid = $con->real_escape_string($id);

         $query = "SELECT * FROM `kepek` WHERE `felhasznalo_id`='$userid' AND `fokep`= 0";
         $res = $con->query($query);
         $result = $res->fetch_all();

         if (count($result) > 0) {

            for ($i = 0; $i < count($result); $i++) {

               $deleteQuery = "DELETE FROM `kepek` WHERE `felhasznalo_id`=$id AND `fokep`=0";
               $con->query($deleteQuery);
               if (file_exists($result[$i][2])) {
                  unlink($result[$i][2]);
               }
            }
            return true;
         }
         return false;
      } catch (Exception $th) {
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! A képek frissítése sikertelen!");
         exit;
      }
   }

}