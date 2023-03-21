<?php
/**
 * DashboardController class
 * This class handles the dashboard related functionalities.
 */
abstract class DashboardController
{
    /**
    * defaultAction method
    * This method loads the default dashboard page.
    */
    public static function defaultAction()
    {
        // Check if user is logged in.
        if (isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] == true) {

            // Get user ID.
            $id = $_SESSION['userId'];
            $idName = "felhasznalo_id";
            $data = array();

            // Fetch user data.
            $data["personal"] = Model::FetchByIdAllDataFromTable("id", $id, "felhasznalo");
            $data["pics"] = Model::FetchByIdAllDataFromTable($idName, $id, "kepek");
            $data["school"] = Model::FetchByIdAllDataFromTable($idName, $id, "iskola");
            $data["job"] = Model::FetchByIdAllDataFromTable($idName, $id, "munkahely");

            // Load dashboard template.
            $template = new View("default");
            $template->Template("dashboard", $data);
        } else {
            // Redirect to login page if user is not logged in.
            header("Location: /login");
        }
    }
}
