<?php
abstract class RestApiOneUserHandler extends CoreController
{
    // Handles GET requests to retrieve data of a single user via API
    public static function GET()
    {
        // Convert all user IDs in the system to integers
        $allIdInt = array_map(function ($user) {
            return (int) $user['id'];
        }, self::$allId);

        // Check if the requested user ID is registered in the system
        if (!in_array(self::$apiUserId, $allIdInt)) {

            // If the user ID is not found, set an error message in the API response
            RestApiView::SetError("No registered API route found for ID: " . self::$apiUserId);
        } else {
            // If the user ID is found, retrieve the user's data and set the response in the API
            RestApiController::restAction(self::$apiUserId);
        }
    }
}