<div class="container">
  <div class="card my-5">
    <div class="card-header d-flex justify-content-between">
      <h3>all people Messages</h3>
      <a href="messages.php?do=create" class="btn btn-success"> create message</a>
    </div>
    <div class="card-body">
      <?php
      //if there is messages for user 
      if ($users_messages) {
        foreach ($users_messages as $user_msg) {
      ?>

      <div class="message-content m-5 p-2 border border-info text-center">
        <h5 class="m-2 p-2 text-info"><?php echo $user_msg["username"] ?></h5>
        <p class="border m-4 p-4"> <?php echo $user_msg["messageContent"] ?></p>
        <!-- editing and deleting will be shown for owner's message only  -->
        <div class="controllers">
          <?php if ($user_msg["userId"] == $_SESSION["userId"]) { ?>
          <a href="messages.php?do=edit&messageId=<?php echo $user_msg["messageId"] ?>"
            class="btn btn-success mr-2">edit</a>
          <a href="messages.php?do=delete&messageId=<?php echo $user_msg["messageId"] ?>"
            class="btn btn-danger">delete</a>
          <?php } ?>
          <a href="allmessages.php?do=viewRely&messageId=<?php echo $user_msg["messageId"] ?>" class="btn btn-info">
            view replies </a>
          <a href="allmessages.php?do=createReply&messageId=<?php echo $user_msg["messageId"] ?>"
            class="btn btn-secondary">
            make reply </a>
        </div>
      </div>
      <?php }
      } //if no messages is created 
      else echo "no messages is created" ?>

    </div>
  </div>
</div>