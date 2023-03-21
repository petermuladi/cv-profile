<?php 
/**
 * The LoginHandler class handles the GET request for the login page.
 * If the user is already logged in, the handler redirects them to the dashboard page.
 * Otherwise, it runs the runBeforeAction method of the LoginController to prepare the login page.
 */

abstract class LoginHandler extends CoreController
{
    public static function GET()
    {
        if (LoggedIn::isLoggedIn()) {
            header("Location: /dashboard");
        } else {
            LoginController::runBeforeAction();
            return;
        }
    }
} 
?>