<?php
ob_start();
$cfg = array();
//Database configuration variables
$cfg["dbhost"] = ""; //default->localhost
$cfg["dbuser"] = ""; //default->root
$cfg["password"] = "";
$cfg["dbname"] = ""; // sajat_profil
//Clean (erase) the output buffer and turn off output buffering
ob_end_clean();