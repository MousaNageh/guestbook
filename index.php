<?php
session_start();
//set index page active for navbar 
$index_page_active = true;
require_once "./helps/init.php";
require_once $shared_files . $header;
require_once $shared_files . $navbar;
require $templetes . $slider_templete;
?>

<?php
require_once $shared_files . $footer;
?>