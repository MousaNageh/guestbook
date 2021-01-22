<div class="card">
  <div class="card-header">
    login to Guestbook
  </div>
  <div class="card-body">
    <?php if (isset($invalid_email_or_password)) { ?>
    <div class="alert alert-danger">
      invalid email or password
    </div>
    <?php } ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" class="form-control 
        <?php
        //check if is set of email validations and if true add red border on the email feild  
        if (isset($login_validations_errors["empty_email"]) || isset($login_validations_errors["invalid_email"]))
          echo 'border-danger';
        else echo ''; ?>" placeholder="email" autocomplete="off">

        <?php
        //check if  empty email  and display the error message 
        if (isset($login_validations_errors["empty_email"])) { ?>
        <small class="text-danger">email can't be empty </small>
        <?php } ?>
        <?php
        //check if  invlid  email  and display the error message 
        if (isset($login_validations_errors["invalid_email"])) { ?>
        <small class="text-danger">invlid email </small>
        <?php } ?>

      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" class="form-control
        <?php
        //check if is set of password validations and if true add red border on the password feild  
        if (isset($login_validations_errors["empty_password"]))
          echo 'border-danger';
        else echo ''; ?>" placeholder="password" autocomplete="new-password">
        <?php
        //check if  empty password and display the error message 
        if (isset($login_validations_errors["empty_password"])) { ?>
        <small class="text-danger">password con't be empty </small>
        <?php } ?>
      </div>
      <div class="confirm-login d-flex justify-content-between">
        <button class="btn btn-success">login</button>
        <a href="">register</a>
      </div>
    </form>
  </div>
</div>