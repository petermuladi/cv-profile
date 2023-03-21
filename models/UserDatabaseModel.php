<?php

abstract class UserDatabaseModel
{

    /**
     * Retrieve the last inserted ID from the database.
     *
     * @return int The last inserted ID.
     */
    public static function LastInsertId(): int
    {
        try {
            $con = DatabaseCon::getConnection();
            $id = $con->insert_id;
            return $id;
        } catch (Exception $th) {
            //throw $th;
            ErrorClass::errorAction("Adabázis hiba! Sikertelen felhasználói azonosító lekérdezés!");
            exit;
        }
    }

    /**
     * Retrieve the IDs of all users in the database.
     *
     * @return array An array of user IDs.
     */
    public static function FetchAllUserId(): array
    {

        try {
            $con = DatabaseCon::getConnection();
            $query = "SELECT `id` FROM `felhasznalo`";
            $res = $con->query($query);

            $result = $res->fetch_all(MYSQLI_ASSOC);

            $res->free_result();

            return $result;
        } catch (Exception $th) {
            //throw $th;
            unset($_SESSION["update-profil"]);
            ErrorClass::errorAction("Adatbázis hiba! Sikertelen a felhasználó azonosítójának lekérdezése!");
            exit;
        }
    }


    /**
     * Retrieve all data for a user with a given ID.
     *
     * @param int $userId The ID of the user to retrieve data for.
     * @return array An array of all data for the user.
     */
    public static function FetchOneUserByIdAllData(int $userId): array
    {

        try {
            //Kapcsolat lekérése
            $con = DatabaseCon::getConnection();

            $userAllData = array();

            $schoolByUser = Model::FetchByIdAllDataFromTable("felhasznalo_id", $userId, "iskola");
            $imgByUser = Model::FetchByIdAllDataFromTable("felhasznalo_id", $userId, "kepek");
            $jobByUser = Model::FetchByIdAllDataFromTable("felhasznalo_id", $userId, "munkahely");


            $id = $con->real_escape_string($userId);

            //Ez lesz a kijelölt tábla a baloldali, LEFT, és mindent kiszedünk 
            //belöle, és hozzá illesztjük a többi táblából azokat az adatokat
            //melyek egy adott felhasználóhoz tartoznak.
            $query = "SELECT 
         `email`,
         `teljes_nev`,
         `szuletesi_hely`,
         `szuletesi_datum`,
         `allampolgarsag`,
         `bemutatkozas`,
         `hobbik`,
         `telefonszamok`
          FROM  `felhasznalo`
          WHERE `id`=$id;
         ";

            $res = $con->query($query);
            $result = $res->fetch_all(MYSQLI_ASSOC);
            $res->free_result();


            $userAllData =
                [
                    "profil" => $result,
                    "school" => $schoolByUser,
                    "images" => $imgByUser,
                    "jobs" => $jobByUser,

                ];


            return $userAllData;
        } catch (Exception $th) {
            ErrorClass::errorAction("Adatbázis hiba! Sikertelen azonosító lekérdezés!");
            exit;
        }
    }

    /**
     * Retrieve email, name, phone number, and primary image for all users.
     *
     * @return array An array of user data.
     */
    public static function FetchAllUserEmailNamePhoneAndPrimaryImage(): array
    {
        try {


            $con = DatabaseCon::getConnection();
            $data = [];
            $query = "SELECT 
             `felhasznalo`.`id`,
             `felhasznalo`.`email`,
             `felhasznalo`.`teljes_nev`,
             `felhasznalo`.`telefonszamok`,
             `kepek`.`eleresi_ut` 
             FROM `felhasznalo`
             LEFT JOIN `kepek` ON `felhasznalo`.`id` = `kepek`.`felhasznalo_id`
             AND `kepek`.`fokep` = 1
             ";

            $res = $con->query($query);
            $result = $res->fetch_all(MYSQLI_ASSOC);
            array_push($data, $result);

            $res->free_result();

            return $data;
        } catch (Exception $th) {
            unset($_SESSION["update-profil"]);
            ErrorClass::errorAction("Adatbázis hiba! Sikertelen felhasználói adat lekérdezés!");
            exit;
        }
    }
}
