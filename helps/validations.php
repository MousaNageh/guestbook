<?php
//check if the input field is empty 
function empty_field($field)
{
  return empty($field);
}
//check if the input filed is email 
function is_email($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}