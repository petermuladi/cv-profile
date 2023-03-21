<?php 

abstract class ProfileController extends DashBoardController
{

      /**
       * Process profile and secondary images
       *
       * @return bool
       */
      public static function ProfilandOtherImages():bool
      {
          $userId = $_SESSION['userId'];

          if (isset($_FILES)) {

              $profileImg = $_FILES["profile-image"];
              $secondaryImgs = $_FILES["secondary-images"];

              // If profile or secondary images exist
              if (isset($profileImg) || isset($secondaryImgs) && is_array($secondaryImgs)) {

                  // Modify profile and secondary images
                  ImageModel::ModifiedProfileAndSecondaryImages($profileImg, $secondaryImgs);

                  // Get all images
                  $profileAndSecondaryImages = ImageModel::getAllImgs();

                  // Process image files
                  ImageFilesController::ImageFilesProcess($profileAndSecondaryImages, $userId);
              }
          }

          // Update profile data
          if (!empty($_POST)) {
              $data = [];

              $data["full-name"] = trim(htmlspecialchars($_POST["full-name"]));
              $data["email"] = trim(htmlspecialchars(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
              $data["phone-numbers"] = trim(htmlspecialchars(filter_input(INPUT_POST, "phone-numbers", FILTER_SANITIZE_NUMBER_INT)));
              $data["birth-place"] = trim(htmlspecialchars($_POST["birth-place"]));
              $data["citizenship"] = trim(htmlspecialchars($_POST["citizenship"]));
              $data["hobbies"] = trim(htmlspecialchars($_POST["hobbies"]));
              $data["birth-date"] = trim(htmlspecialchars($_POST["birth-date"]));
              $data["introduction"] = trim(htmlspecialchars($_POST["introduction"]));

              // If profile data is updated
              if (DashboardProfilDataDatabaseModel::UpdateProfileData($data, $userId)) {
                  $_SESSION["update-profil"] = true;
              }
          }

          return true;
      }
}
