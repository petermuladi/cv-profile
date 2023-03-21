<?php
// This class handles the POST request to modify the user's profile data and images.
abstract class ModifiedProfileHandler extends CoreController
{
    public static function POST()
    {
        if (ProfileController::ProfilandOtherImages()) {
            header("Location: /dashboard"); // redirect to the dashboard page after successful modification
            return;
        }
    }
}
