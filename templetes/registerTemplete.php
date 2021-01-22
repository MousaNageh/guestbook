<div class="card my-5">
  <div class="card-header">
    register to Guestbook
  </div>
  <div class="card-body">
    <?php if (isset($register_validations_errors["error_operation"])) { ?>
    <div class="alert alert-danger">error in server operation try again </div>
    <?php } ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
      <div class="form-group">
        <label for="username"> username</label>
        <input type="text" id="username" name="username" maxlength="50" class="form-control" placeholder="username"
          required value="<?php if (!empty($register_validations_errors)) echo $username ?>">
        <?php if (isset($register_validations_errors["empty_username"])) { ?>
        <small class="text-danger"> - username can't be empty - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["username_exceed_len"])) { ?>
        <small class="text-danger"> - username max length must be less than 50 characters - </small>
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="full-name"> full name</label>
        <input type="text" id="full-name" name="full-name" class="form-control" placeholder="full-name" required
          value="<?php if (!empty($register_validations_errors)) echo $full_name ?>">
        <?php if (isset($register_validations_errors["empty_full_name"])) { ?>
        <small class="text-danger"> - full name can't be empty - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["full_name_exceed_len"])) { ?>
        <small class="text-danger"> - full name max length must be less than 50 characters - </small>
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="email" required
          value="<?php if (!empty($register_validations_errors)) echo $email ?>">
        <?php if (isset($register_validations_errors["empty_email"])) { ?>
        <small class="text-danger"> - email can't be empty - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["invalid_email"])) { ?>
        <small class="text-danger"> - invalid email - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["exists_email"])) { ?>
        <small class="text-danger"> - email Aleady exists - </small>
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="password">password <small class="text-info"> (at last 8 digits includes at least one capital digit
            and at leat 2 numbers
            )</small></label>
        <input type="password" id="password" minlength="8" name="password" class="form-control password"
          placeholder="password" required value="<?php if (!empty($register_validations_errors)) echo $password ?>">
        <?php if (isset($register_validations_errors["empty_password"])) { ?>
        <small class="text-danger"> - password can't be empty - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["small_password"])) { ?>
        <small class="text-danger"> - password must at least 8 digits - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["password_not_contains_2_numbers"])) { ?>
        <small class="text-danger"> - password must contains at least 2 numbers - </small>
        <?php } ?>
        <?php if (isset($register_validations_errors["password_not_contains_captial_letter"])) { ?>
        <small class="text-danger"> - password must contains at least one Capital letter - </small>
        <?php } ?>
      </div>
      <div class="confirm-register d-flex justify-content-between">
        <button class="btn btn-success">register</button>
        <a href="login.php">login</a>
      </div>
    </form>
  </div>
</div>