<?php 
abstract class SignUpHandler extends CoreController
{
    // Render the default signup page
    public static function GET()
    {
        try {
            if (LoggedIn::isLoggedIn()) {
                header("Location: /dashboard");
            } else {
                SignUpController::defaultAction();
                unset($_SESSION["duplicate-email"]);
                return;
            }
        } catch (Exception $th) {
            // If an exception is thrown, set a session variable indicating a duplicate email error
            $_SESSION["duplicate-email"] = true;
            exit;
        }

    }
}