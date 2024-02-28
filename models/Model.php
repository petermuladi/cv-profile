<?php
//This abstract class contains a static function for fetching 
//all data from a table based on a specific ID value
abstract class Model
{
   public static function fetchByIdAllDataFromTable(string $idname, int $id, string $table): array
   {

      try {
         $con = DatabaseCon::getConnection();

         $query = "SELECT * FROM `$table` WHERE `$idname` = $id";

         $res = $con->query($query);

         $returnRes = $res->fetch_all(MYSQLI_ASSOC);

         $res->free_result();

         return $returnRes;
      } catch (Exception $th) {
         ErrorClass::errorAction("Adatbázis hiba!");
         exit;
      }
   }

}