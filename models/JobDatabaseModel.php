<?php

abstract class JobDatabaseModel
{
    /*
    This abstract class represents the Job database model and provides static 
    methods for updating and creating job records in the database.
    /
    abstract class JobDatabaseModel
    /*
    Updates the job records of a user in the database based on the provided data.
    @param array $data An array of job data containing id, compname, start, end, and position.
    @param int $userId The id of the user whose job records are being updated.
    @return bool Returns true if the update was successful, otherwise false.
    */
    public static function UpdateJob(array $data, int $userId): bool
    {
        try {

            $con = DatabaseCon::getConnection();

            $allJobs = Model::FetchByIdAllDataFromTable("felhasznalo_id", $userId, "munkahely");
            $newData = [];

            $update = [];

            $i = 0;

            foreach ($data as $item) {
                $newData[$i]['id'] = $item["id"];
                $newData[$i]['felhasznalo_id'] = $userId;
                $newData[$i]['cegnev'] = $item['compname'];
                $newData[$i]['kezdes_datuma'] = $item['start'];
                $newData[$i]['befejezes_datuma'] = $item['end'];
                $newData[$i]['munkakor'] = $item['position'];
                $i++;
            }
            foreach ($allJobs as $olditem) {

                foreach ($newData as $item) {
                    if ((int)$olditem['id'] == (int)$item["id"]) {
                        if (
                            $olditem["cegnev"] != $item["cegnev"] ||
                            $olditem["kezdes_datuma"] != $item["kezdes_datuma"] ||
                            $olditem["befejezes_datuma"] != $item["befejezes_datuma"] ||
                            $olditem["munkakor"] != $item["munkakor"]
                        ) {

                            array_push($update, $item);
                        }
                    }
                }
            }
            $query = "UPDATE `munkahely`
         SET 
         `cegnev`=?,
         `kezdes_datuma`=?,
         `befejezes_datuma`=?,
         `munkakor`=?

         WHERE `felhasznalo_id`=$userId AND `id`=?";

            foreach ($update as $item) {

                $stmt = $con->prepare($query);
                $stmt->bind_param(
                    "ssssi",
                    $item['cegnev'],
                    $item['kezdes_datuma'],
                    $item['befejezes_datuma'],
                    $item['munkakor'],
                    $item['id']
                );
                $stmt->execute();
                $stmt->close();
            }
            return true;
        } catch (Exception $th) {
            unset($_SESSION["update-profil"]);
            ErrorClass::errorAction("Adatbázis hiba! A munkahely frissítése sikertelen!");
            exit;;
        }
    }

    /*
    Creates new job records for a user in the database based on the provided data.
    @param array $data An array of job data containing compname, start, end, and position.
    @param int $id The id of the user for whom new job records are being created.
    @return bool Returns true if the creation was successful, otherwise false.
    */
    public static function CreateJob(array $data, int $id): bool
    {
        try {
            $con = DatabaseCon::getConnection();
            $query = "INSERT INTO `munkahely` (`cegnev`,`kezdes_datuma`,`befejezes_datuma`,`munkakor`,`felhasznalo_id`)
         VALUES(?,?,?,?,?)";

            foreach ($data as $item) {

                $stmt = $con->prepare($query);
                $stmt->bind_param(
                    'ssssi',
                    $item['compname'],
                    $item['start'],
                    $item['end'],
                    $item['position'],
                    $id
                );

                $stmt->execute();
                $stmt->close();
            }

            return true;
        } catch (Exception $th) {
            //throw $th;
            unset($_SESSION["update-profil"]);
            ErrorClass::errorAction("Adatbázis hiba! Az új munkahely felvitele sikertelen!");
            exit;
        }
    }
}
