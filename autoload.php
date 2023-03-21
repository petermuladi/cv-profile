<?php
// This function registers an anonymous function as an autoloader for PHP classes. 
// It searches for the specified class in several directories and requires the file if found.
// This allows us to avoid manual inclusion of class files in the code.
spl_autoload_register(function ($type) {
    $phpFolders = array("controllers", "views", "models", "src", "handlers", "templates");
    foreach ($phpFolders as $folder) {
        if (file_exists($folder . "/" . $type . ".php")) {
            require_once($folder . "/" . $type . ".php");
            return;
        }
    }
});
