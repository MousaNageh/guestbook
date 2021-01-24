<div class="container">
  <div class="card my-5">
    <div class="card-header">
      <h3>message and replies</h3>
    </div>
    <div class="card-body">
      <h5 class="border border-info text-center p-3 m-4"><?php echo $message["messageContent"] ?></h5>
      <h5 class="text-center p-3 m-4 text-success">replies </h5>
      <?php if ($replies) {
        foreach ($replies as $reply) {
      ?>
      <div class="rely m-3 p-3 border-bottom">
        <h6 class="mb-3"><?php echo $reply["fullName"] ?></h6>
        <p><?php echo $reply["replyContent"] ?> </p>

      </div>
      <?php
        }
        ?>
      <?php } else echo "<p>no relies for this message<p> ";
      ?>
      <a href="allmessages.php?do=createReply&messageId=<?php echo $message["messageId"] ?>" class="btn btn-secondary">
        make reply </a>
    </div>

  </div>
</div>