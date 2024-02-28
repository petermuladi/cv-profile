<?php
abstract class LoginController
{
    // This function is called before the Login function.
    // It sets up the default login template.
    public static function runBeforeAction()
    {
        $template = new View("default");
        $template->Template("login");
    }

    // This function logs the user in by verifying the email and password
    // against the database.
    public static function login()
    {
        $mail = htmlspecialchars($_POST["email"]);
        $pass = hash("sha256", htmlspecialchars($_POST["password"]));

        // If the email and password are correct, log the user in.
        if (LoginDatabaseModel::login($mail, $pass)) {
            $_SESSION["logged-in"] = true;
            $_SESSION["userId"] = LoginDatabaseModel::Login($mail,$pass);

            // If there was an error previously, unset it.
            if(isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }

            // Redirect to the user's dashboard.
            header("Location: /dashboard");
        }
        // If the email or password are incorrect, redirect back to the login page.
        else {
            if(isset($_SESSION["logged-in"])) {
                unset($_SESSION["logged-in"]);
            }
            
            $_SESSION['error'] = true;
            header("Location: /login");
        }
    }
}