<?php 
abstract class DashboardHandler extends CoreController
{
    //GET method handler for dashboard
    public static function GET()
    {
        DashboardController::defaultAction();
    }
}