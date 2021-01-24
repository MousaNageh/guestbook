<?php
session_start();
require_once "./helps/init.php";
require_once $helps . $redirect;
if (isset($_SESSION["email"])) {
  //set messages page active for navbar 
  $all_messages_page_active = true;

  require_once $shared_files . $header;
  require_once $shared_files . $navbar;
  require_once $helps . $sanitizers;
  require_once $helps . $validations;
  require_once $helps . $query_builder;

  //create reply request 
  if (isset($_POST) && isset($_POST["reply"])) {
    $reply = sanitize_string($_POST["reply"]);
    if (empty($reply))
      $empty_reply = true;
    $message_id = sanitize_int($_POST["messageId"]);
    if (!isset($empty_reply)) {
      $inseted = insert("replies", ["replyContent", "messageId", "userId"], [$reply, $message_id, $_SESSION["userId"]]);
      if ($inseted)
        header("location:allmessages.php?do=viewRely&messageId=" . $message_id);
      else
        $error_operation = true;
    }
  }

  //main page of all messages will called if not query is set 
  if (!isset($_GET["do"])) {
    $users_messages = select_all_from_two_tables("users", "messages", "users.userId=messages.userId");
    require_once $templetes . $all_messages_tempelete;
  }



  // creates reply page 
  elseif ($_GET["do"] == "createReply") {
    $messsage_for_reply = select_from_two_tables("users", "messages", "users.userId=messages.userId", "messages.messageId=?", [sanitize_int($_GET["messageId"])])[0];
    require_once $templetes . $create_reply_templete;
  }

  //show message and replies 

  if ($_GET["do"] == "viewRely") {
    $message = select("messages", ["messageId", "messageContent"], "messageId=?", [sanitize_int($_GET["messageId"])])[0];
    if ($message) {
      $replies = select_from_two_tables("replies", "users", "replies.userId=users.userId", "replies.messageId=?", [$message["messageId"]]);
      require_once $templetes . $view_message_reply_templete;
    } else {
      redirect_to("index");
      exit();
    }
  }

  require_once $shared_files . $footer;
} else {
  //if user not signed in redirct him/her to login page 
  redirect_to("login");
}