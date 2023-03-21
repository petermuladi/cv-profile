<?php
abstract class Logout
{
    //Logout
    public static function Logout()
    {
        if (isset($_SESSION["logged-in"])) {
            session_destroy();
            header("Location: /");
        }

        return;
    }
}
