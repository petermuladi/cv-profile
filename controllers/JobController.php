<?php 
abstract class JobController extends DashBoardController
{
      /**
       * Method to modify the user's job data
       * @return bool Returns true if the job data was modified successfully, otherwise false.
       */
      public static function ModifiedJob():bool
      {
          $userId = $_SESSION["userId"];

          if (isset($_POST)) {
  
              $postJobData = $_POST;
              $newJobDataToDatabase = [];
              $oldJobsDataToDatabase = [];
  
              $i = 0;
  
              foreach ($postJobData as $key => $value) {
  
                  // Process dynamically generated input data
                  if (strpos($key, "compname-") === 0) {
                      $id = substr($key, strlen("compname-"));
  
                      $newJobDataToDatabase[$i]['compname'] = htmlspecialchars($postJobData['compname-' . $id]);
                      $newJobDataToDatabase[$i]['start'] =  htmlspecialchars($postJobData['startDate-' . $id]);
                      $newJobDataToDatabase[$i]['end'] = htmlspecialchars($postJobData['endDate-' . $id]);
                      $newJobDataToDatabase[$i]['position'] = htmlspecialchars($postJobData['position-' . $id]);
                      $i++;
  
                  }
  
                  // Process existing job data
                  elseif (strpos($key, "compname_") === 0) {
  
                      $id = substr($key, strlen("compname_"));
  
                      $oldJobsDataToDatabase[$i]['id'] = $id;
                      $oldJobsDataToDatabase[$i]['compname'] = htmlspecialchars($postJobData['compname_' . $id]);
                      $oldJobsDataToDatabase[$i]['start'] =  htmlspecialchars($postJobData['startDate_' . $id]);
                      $oldJobsDataToDatabase[$i]['end'] = htmlspecialchars($postJobData['endDate_' . $id]);
                      $oldJobsDataToDatabase[$i]['position'] = htmlspecialchars($postJobData['position_' . $id]);
                      $i++;
                  }
              }
  
              // Update existing job data
              if(JobDatabaseModel::UpdateJob($oldJobsDataToDatabase,$userId))
              {
                  $_SESSION["update-profil"] = true;
  
              };
              
              // Create new job data
               if(JobDatabaseModel::CreateJob($newJobDataToDatabase,$userId))
               {
                   $_SESSION["update-profil"] = true;
               };
  
              return true;
          }
      }
}
