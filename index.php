<?php

define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require("./Controllers/Controller.php");
require("./Models/Model.php");

require("./Database.php");

require('./Router.php');
require('./Request.php');
require('./Dispatcher.php');

session_start();
$dispatch = new Dispatcher();
$dispatch->dispatch();
?>