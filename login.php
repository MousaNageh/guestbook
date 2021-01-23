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

  //check if the user click in login button
  if ($_SERVER["REQUEST_METHOD"] == 'POST' || $_POST) {
    //getting user's entered data  
    $email = $_POST["email"];
    $password = $_POST["password"];

    //making validations on email and password
    $login_validations_errors = [];

    // 1) for email

    if (!empty_field($email)) {
      //sanitize email 
      $email = sanitize_email($email);
      //check if the email is valid or not 
      if (!is_email($email)) $login_validations_errors["invalid_email"] = true;
    } else // set empty email if the email field is empty 
      $login_validations_errors["empty_email"] = true;

    //2) for  password
    if (empty_field($password))
      $login_validations_errors["empty_password"] = true;

    //if there is no errors : check if the user exists in database 
    if (empty($login_validations_errors)) {
      //find user in database 
      $user = select("users", ["email", "password", "userId"], "email=? and password = ?", [$email, sha1($password)]);
      //check if user is exists in database 
      if ($user) {
        $_SESSION["email"] = $email;
        $_SESSION["userId"] = $user[0]["userId"];
        //redirect to home page 
        redirect_to("index");
        exit();
      } else {
        $invalid_email_or_password = true;
      }
    }
  }
?>
<div class="login-body">
  <div class="container">
    <div class="login my-5">
      <?php require_once $templetes . $login_templete ?>
    </div>
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

?>