<?php
//sanitize email 
function sanitize_email($email)
{
  return filter_var($email, FILTER_SANITIZE_EMAIL);
}