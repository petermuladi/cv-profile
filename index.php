<?php
// Start a session to allow for the use of session variables
session_start();
// Require the autoload file which contains the spl_autoload_register function
require_once("autoload.php");
// Require the configuration file to access database credentials
require_once("config.php");
// Connect to the database
DatabaseCon::Connect();
// Route the request to the appropriate controller and action
CoreController::Router();
// Disconnect from the database
DatabaseCon::Disconnect();
?>
