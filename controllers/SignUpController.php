<?php 
abstract class SignUpController
{

    //Render the default signup page
    public static function defaultAction()
    {
        $template = new View("default");
        $template->Template("signup");
    }

    //Handle registration form submission
    public static function RegistrateAction():bool
    {
      
        try {
            $data = array();

            $data["email"] = $_POST["email"];
            $data["jelszo"] = hash('sha256', $_POST["password"]);
            $data["teljes_nev"] = $_POST["name"];
            $data["szuletesi_hely"] = $_POST["birthplace"];
            $data["szuletesi_datum"] = $_POST["birthdate"];
    
    
            RegistrationDatabaseModel::Registration($data);
    
            $userId = UserDatabaseModel::LastInsertId();

            if(isset($_SESSION["duplicate-email"]) && $_SESSION["duplicate-email"]==true)
            {
                unset($_SESSION["duplicate-email"]);
            }
    
            $_SESSION["userId"] = $userId;
            $_SESSION["logged-in"] = true;
            header("Location: /dashboard");
            return true;

        } catch (Exception $th) {
            header("Location: /signup");
            $_SESSION["duplicate-email"] = true;
        }
        
    }
}
