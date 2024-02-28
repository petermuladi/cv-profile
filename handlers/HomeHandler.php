<?php 
abstract class HomeHandler extends CoreController
{
    // Handle HTTP GET requests
    public static function GET()
    {
        // If the user is already logged in, redirect to the dashboard
        if (LoggedIn::isLoggedIn()) {
            header("Location: /dashboard");
        } 
        // Otherwise, show the home page
        else {
            HomeController::defaultAction();
        }
    }
}