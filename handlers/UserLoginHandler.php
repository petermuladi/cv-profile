<?php
//Login User
abstract class UserLoginHandler extends CoreController
{
    public static function POST()
    {
        LoginController::Login();
        return;
    }
}
