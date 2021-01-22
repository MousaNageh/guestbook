<?php
//sanitize email 
function sanitize_email($email)
{
  return filter_var($email, FILTER_SANITIZE_EMAIL);
}
function sanitize_string($str)
{
  return filter_var($str, FILTER_SANITIZE_STRING);
}