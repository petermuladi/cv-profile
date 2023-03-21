<?php
// Abstract class for the home controller
abstract class HomeController
{
    // The default action
    public static function defaultAction()
    {
        // Fetch all user email, name, phone, and primary image
        $usersInfo = UserDatabaseModel::FetchAllUserEmailNamePhoneAndPrimaryImage();

        // Create a new view and render the template
        $template = new View("default");
        $template->Template("home", $usersInfo);
    }
}
