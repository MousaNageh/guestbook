<div class="container">
  <div class="card my-5">
    <div class="card-header">
      <h4>create Message </h4>
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
          <label for="message">message</label>
          <textarea name="message" id="message" rows="5" class="form-control" placeholder="type your message "
            aria-describedby="helpId" required></textarea>
          <?php //show errors 
          if (isset($empty_message)) {
          ?>
          <small class="text-danger">message can't be empty </small>
          <?php } ?>
        </div>
        <button class="btn btn-success">create message </button>
      </form>
    </div>
  </div>
</div>