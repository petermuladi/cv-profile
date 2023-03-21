<?php 
abstract class OneUserHandler extends CoreController
{
    /**
     * Handles the GET request for a single user.
     */
    public static function GET()
    {
        
        $id = array("singleUserId" => self::$userId); // integer

        $allIdInt = array_map(function($user) {
            return (int) $user['id'];
        }, self::$allId);

        // If the user ID is not in the list of all IDs, show a 404 page.
        if (!in_array($id["singleUserId"], $allIdInt)) {
            PageNotFoundController::defaultAction();
            return;
        } else {
            // Show the single user page.
            SingleUserController::defaultAction($id);
            return;
        }

    }
}
