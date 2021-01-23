<div class="container">
  <div class="card my-5">
    <div class="card-header d-flex justify-content-between">
      <h3>My Messages</h3>
      <a href="messages.php?do=create" class="btn btn-success"> create message</a>
    </div>
    <div class="card-body">
      <?php
      //if there is messages for user 
      if ($user_messages) {
        foreach ($user_messages as $user_msg) {
      ?>
      <div class="message-content m-2 p-2 border-bottom">
        <p> <?php echo $user_msg["messageContent"] ?></p>
        <div class="controllers d-flex justify-content-end">
          <a href="messages.php?do=edit&messageId=<?php echo $user_msg["messageId"] ?>"
            class="btn btn-success mr-2">edit</a>
          <a href="messages.php?do=delete&messageId=<?php echo $user_msg["messageId"] ?>"
            class="btn btn-danger">delete</a>

        </div>
      </div>
      <?php }
      } //if no messages is created 
      else echo "no messages is created" ?>

    </div>
  </div>
</div>