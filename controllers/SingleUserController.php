<?php 

abstract class SingleUserController
{
    /**
     * Shows the single user page.
     *
     * @param array $id The ID of the user to show.
     */
    public static function defaultAction(array $id)
    {
        $template = new View("default");
        $template->Template("singleUser",$id);
    }
}