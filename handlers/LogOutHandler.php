<?php 
abstract class LogOutHandler extends CoreController
{
    public static function POST()
    {
        Logout::logout();
    }
}