<?php 
abstract class PageNotFoundController
{
    /**
     * Show the 404 page.
     */
    public static function defaultAction()
    {
        $template = new View("default");
        $template->Template("404");
    }
}
