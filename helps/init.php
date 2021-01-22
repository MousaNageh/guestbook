<?php

/**********routes and paths*************/
$css_files = "css/";
$js_files = "js/";
$shared_files = "shared/";
$database = "database/connection/";
$templetes = "templetes/";
$helps = "helps/";


/**********files*************/



//css
$main_css_file = "main.css";
$bootstrap_css = "bootstrap.min.css";



//js 
$main_js_file = "main.js";
$bootstrap_js = "bootstrap.js";

//footer 
$footer = "footer.php";


//header 
$header = "header.php";


//navbar 
$navbar = "navbar.php";


//database connection 
$database_connection = "connect.php";


//templetes
$login_templete = "loginTemplete.php";

// validations 
$validations = "validations.php";

//sanitizers 
$sanitizers = "sanitizers.php";

//query builder 
$query_builder = "queryBuilder.php";
/*******including database connection *******/
require_once $database . $database_connection;