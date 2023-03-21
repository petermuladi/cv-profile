<?php 

/**
 * SchoolController handles the modification of schools in user profile
 */
abstract class SchoolController extends DashBoardController
{
    /**
     * ModifiedSchool handles the modification of schools in user profile
     *
     * @return bool
     */
    public static function ModifiedSchool(): bool
    {
        $userId = $_SESSION['userId'];

        if (isset($_POST)) {

            $postSchoolData = $_POST;
            $oldSchoolDataToDatabase = [];
            $newSchoolDataToDatabase = [];
            $i = 0;

            // Process dynamic inputs for new schools
            foreach ($postSchoolData as $key => $value) {
                if (strpos($key, 'institution-') === 0) {
                    $id = substr($key, strlen('institution-'));

                    $newSchoolDataToDatabase[$i]['institution'] = htmlspecialchars($postSchoolData['institution-' . $id]);
                    $newSchoolDataToDatabase[$i]['start'] = htmlspecialchars($postSchoolData['start-' . $id]);
                    $newSchoolDataToDatabase[$i]['end'] =  htmlspecialchars($postSchoolData['end-' . $id]);
                    $newSchoolDataToDatabase[$i]['major'] = htmlspecialchars($postSchoolData['major-' . $id]);
                    $i++;
                }
                // Process existing schools for update
                elseif (strpos($key, 'institution_') === 0) {
                    $id = substr($key, strlen('institution_'));

                    $oldSchoolDataToDatabase[$i]['id'] = $id;
                    $oldSchoolDataToDatabase[$i]['institution'] = htmlspecialchars($postSchoolData['institution_' . $id]);
                    $oldSchoolDataToDatabase[$i]['start'] = htmlspecialchars($postSchoolData['start_' . $id]);
                    $oldSchoolDataToDatabase[$i]['end'] = htmlspecialchars($postSchoolData['end_' . $id]);
                    $oldSchoolDataToDatabase[$i]['major'] =  htmlspecialchars($postSchoolData['major_' . $id]);
                    $i++;
                }
            }
            // Update existing schools
            if (SchoolDatabaseModel::UpdateSchool($oldSchoolDataToDatabase, $userId)) {
                $_SESSION["update-profil"] = true;
            }
            // Create new schools
            if (SchoolDatabaseModel::CreateSchool($newSchoolDataToDatabase, $userId)) {
                $_SESSION["update-profil"] = true;
            }

            return true;
        }
    }

}