<?php 
abstract class RegistrationHandler extends CoreController
{
    /**
     * Handles the registration form submission and initiates the registration process.
     * Redirects to the dashboard upon successful registration.
     */
    public static function POST()
    {
        SignUpController::RegistrateAction();
    }
}