<div class="container">
  <div class="card my-5">
    <div class="card-header">
      <h4>edit Message </h4>
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="form-group">
          <label for="message">message</label>
          <textarea name="message_edited" id="message" rows="5" class="form-control" placeholder="type your message "
            aria-describedby="helpId" required><?php echo $message_for_editing ?></textarea>
        </div>
        <!-- for sendinn message id to post request  -->
        <input type="hidden" name="messageId" value="<?php echo $_GET["messageId"] ?>">
        <button class="btn btn-success">save </button>
      </form>
    </div>
  </div>
</div>