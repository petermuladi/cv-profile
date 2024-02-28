<?php 
/*Page not found - 404*/
abstract class NotFoundHandler extends CoreController
{
   public static function GET()
   {
    PageNotFoundController::defaultAction();
   }
}