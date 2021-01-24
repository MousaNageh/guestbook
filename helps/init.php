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
$register_templete = "registerTemplete.php";
$slider_templete = "sliderTemplete.php";
$message_templete = "MymessageTemplete.php";
$create_message_tempelete = "createMessageTemplete.php";
$edit_message_tempelete = "MyEditMessageTemplete.php";
$all_messages_tempelete = "allMessagesTemplete.php";
$create_reply_templete = "createReplyTemplete.php";
$view_message_reply_templete = "viewMessageAndReplyTemplete.php";

// validations 
$validations = "validations.php";

//sanitizers 
$sanitizers = "sanitizers.php";

//query builder 
$query_builder = "queryBuilder.php";

//redirect 
$redirect = "redirect.php";
/*******including database connection *******/
require_once $database . $database_connection;