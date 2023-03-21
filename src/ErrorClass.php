<?php 
abstract class ErrorClass
{
      /**
     * Executes error action with given error message.
     *
     * @param string $message Error message to display.
     * @return void
     */
    public static function errorAction(string $message)
    {

        $errorData = array("hiba"=>$message);

        $template = new View("default");
        $template->Template("errorTemplate",$errorData);
    }

}