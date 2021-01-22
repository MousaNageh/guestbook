<?php
function redirect_to($page_name)
{
  header("location:" . $page_name . ".php");
}
function redirect_back()
{
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}