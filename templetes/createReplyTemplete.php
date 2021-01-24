<div class="container">
  <div class="card my-5">
    <div class="card-header">
      <h4> create reply </h4>
    </div>
    <div class="card-body">
      <div class="border border-info m-4 p-4 text-center">
        <h4 class="test-info border-bottom border-info text-info p-3 mb-3"><?php echo $messsage_for_reply["fullName"] ?>
        </h4>
        <p> <?php echo $messsage_for_reply["messageContent"] ?></p>
        <p class="d-flex justify-content-end text-info"> <?php echo $messsage_for_reply["email"] ?></p>
      </div>
      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <input type="hidden" name="messageId" value="<?php echo $_GET["messageId"] ?>">
        <div class="form-group">
          <label for="reply">reply</label>
          <textarea name="reply" id="reply" rows="4" class="form-control" placeholder="type your reply "
            aria-describedby="helpId" required></textarea>
          <?php //show errors 
          if (isset($empty_reply)) {
          ?>
          <small class="text-danger">reply can't be empty </small>
          <?php } ?>
        </div>
        <button class="btn btn-success">create reply </button>
      </form>
    </div>
  </div>
</div>