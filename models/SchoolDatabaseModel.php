<?php

abstract class SchoolDatabaseModel
{
   /**
    * Updates school-related data of a user in the database based on the given data and user ID.
    *
    * @param array $data The new school-related data to be updated.
    * @param int $userId The ID of the user whose school-related data will be updated.
    * @return bool Returns true if the update was successful, false otherwise.
    */
   public static function UpdateSchool(array $data, int $userId): bool
   {
      try {

         $con = DatabaseCon::getConnection();

         $allSchool = Model::FetchByIdAllDataFromTable("felhasznalo_id", $userId, "iskola");
         $newData = [];

         $update = [];

         $i = 0;

         foreach ($data as $item) {
            $newData[$i]['id'] = $item["id"];
            $newData[$i]['felhasznalo_id'] = $userId;
            $newData[$i]['intezmeny_neve'] = $item['institution'];
            $newData[$i]['kezdes_datuma'] = $item['start'];
            $newData[$i]['befejezes_datuma'] = $item['end'];
            $newData[$i]['szak'] = $item['major'];
            $i++;
         }


         foreach ($allSchool as $olditem) {

            foreach ($newData as $item) {
               if ((int)$olditem['id'] == (int)$item["id"]) {
                  if (
                     $olditem["intezmeny_neve"] != $item["intezmeny_neve"] ||
                     $olditem["kezdes_datuma"] != $item["kezdes_datuma"] ||
                     $olditem["befejezes_datuma"] != $item["befejezes_datuma"] ||
                     $olditem["szak"] != $item["szak"]
                  ) {
                     array_push($update, $item);
                  }
               }
            }
         }
         $query = "UPDATE `iskola`
         SET 
         `intezmeny_neve`=?,
         `kezdes_datuma`=?,
         `befejezes_datuma`=?,
         `szak`=?

         WHERE `felhasznalo_id`=$userId AND `id`=?";

         foreach ($update as $item) {

            $stmt = $con->prepare($query);
            $stmt->bind_param(
               "ssssi",
               $item['intezmeny_neve'],
               $item['kezdes_datuma'],
               $item['befejezes_datuma'],
               $item['szak'],
               $item['id']
            );
            $stmt->execute();
            $stmt->close();
         }
         return true;
      } catch (Exception $th) {
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! Az iskola módosítása sikertelen!");
         exit;
      }
   }
   /**
    * Creates new school-related data in the database for a user based on the given data and ID.
    *
    * @param array $data The new school-related data to be created.
    * @param int $id The ID of the user for whom the school-related data will be created.
    * @return bool Returns true if the creation was successful, false otherwise.
    */
   public static function CreateSchool(array $data, int $id): bool
   {
      try {
         $con = DatabaseCon::getConnection();
         $query = "INSERT INTO `iskola` (`intezmeny_neve`,`kezdes_datuma`,`befejezes_datuma`,`szak`,`felhasznalo_id`)
         VALUES(?,?,?,?,?)";

         foreach ($data as $item) {

            $stmt = $con->prepare($query);
            $stmt->bind_param(
               'ssssi',
               $item['institution'],
               $item['start'],
               $item['end'],
               $item['major'],
               $id
            );

            $stmt->execute();
            $stmt->close();
         }

         return true;
      } catch (Exception $th) {
         unset($_SESSION["update-profil"]);
         ErrorClass::errorAction("Adatbázis hiba! Az új iskola felvitele sikertelen!");
         exit;
      }
   }
}
