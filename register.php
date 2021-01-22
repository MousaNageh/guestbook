<?php
//starting the session for user
session_start();
require_once "./helps/init.php";
require_once $helps . $redirect;
//check if user  signed  in  or not 
if (!isset($_SESSION["email"])) {
  require_once $helps . $validations;
  require_once $helps . $sanitizers;
  require_once $helps . $query_builder;
  require_once $shared_files . $header;
  //check if the user click in register button
  if ($_SERVER["REQUEST_METHOD"] == 'POST' || $_POST) {
    //getting user's entered data
    $username = $_POST["username"];
    $full_name = $_POST["full-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //making validations on email and password
    $register_validations_errors = [];

    //sanitize username and full name end email 
    $username = sanitize_string($username);
    $full_name = sanitize_string($full_name);
    $email = sanitize_email($email);

    //making validations 


    //1) validtion on username 
    if (empty_field($username))
      $register_validations_errors["empty_username"] = true;
    elseif (string_maxLen($username, 50))
      $register_validations_errors["username_exceed_len"] = true;


    //2) validtion on full name 
    if (empty_field($full_name))
      $register_validations_errors["empty_full_name"] = true;
    elseif (string_maxLen($full_name, 50))
      $register_validations_errors["full_name_exceed_len"] = true;


    //3)email 
    if (empty_field($email))
      $register_validations_errors["empty_email"] = true;
    elseif (!is_email($email))
      $register_validations_errors["invalid_email"] = true;
    else {
      //checking if the email is exist in database or not 
      $user_email = select("users", ["email"], "email=?", [$email]);
      if ($user_email)
        $register_validations_errors["exists_email"] = true;
    }

    //4) password 
    if (empty_field($password))
      $register_validations_errors["empty_password"] = true;
    //check if the password is more than or equal 8 digits 
    elseif (string_minLen($password, 8))
      $register_validations_errors["small_password"] = true;
    elseif (!contains_number($password, 2))
      $register_validations_errors["password_not_contains_2_numbers"] = true;
    elseif (!contains_capital_letter($password))
      $register_validations_errors["password_not_contains_captial_letter"] = true;

    //add user to dadabase 
    if (empty($register_validations_errors)) {
      $inseted_successfully = insert("users", ["username", "fullName", "email", "password"], [$username, $full_name, $email, sha1($password)]);
      if ($inseted_successfully) {
        $_SESSION["email"] = $email;
        redirect_to("index");
        exit();
      } else {
        $register_validations_errors["error_operation"] = true;
      }
    }
  }


?>
<div class="register-body">
  <div class="container">
    <?php require_once $templetes . $register_templete ?>
  </div>
</div>
<?php
  require_once $shared_files . $footer;
}
//if user signed in redirect to home page 
else {
  redirect_to("index");
  exit();
}