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
function string_maxLen($string, $len)
{
  return strlen($string) > $len;
}
function string_minLen($strign, $len)
{
  return $len >= strlen($strign);
}
function contains_number($string, $number_of_digits = 1)
{
  $matches =  preg_match_all("/[0-9]/", $string);
  if ($matches == 0)
    return false;
  elseif ($number_of_digits > $matches)
    return false;
  else
    return true;
}
function contains_capital_letter($string)
{
  $match = preg_match("/[A-Z]/", $string);
  if ($match == 0)
    return false;
  else
    return true;
}