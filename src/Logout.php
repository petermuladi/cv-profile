<?php
abstract class Logout
{
    //Logout
    public static function logout()
    {
        if (isset($_SESSION["logged-in"])) {
            session_destroy();
            header("Location: /");
        }
    }
}