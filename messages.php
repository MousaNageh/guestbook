<?php
session_start();
require_once "./helps/init.php";
require_once $helps . $redirect;
//check if user is signed in or not 
if (isset($_SESSION["email"])) {
  //set messages page active for navbar 
  $messages_page_active = true;

  require_once $shared_files . $header;
  require_once $shared_files . $navbar;
  require_once $helps . $sanitizers;
  require_once $helps . $validations;
  require_once $helps . $query_builder;




  //creating message and it's validtion
  if ($_POST && isset($_POST["message"])) {
    //santize message 
    $message = sanitize_string($_POST["message"]);
    //if the message is empty 
    if (empty_field($message))
      $empty_message = true;
    if (!isset($empty_message)) {
      if (insert("messages", ["messageContent", "userId"], [$message, $_SESSION["userId"]]))
        redirect_to("messages");
      else
        $error_operation = true;
    }
  }


  //updating message and it's validtion
  if ($_POST && isset($_POST["message_edited"])) {
    //santize message 
    $message_edit = sanitize_string($_POST["message_edited"]);
    //if the message is empty 
    if (empty_field($message_edit))
      $empty_message = true;
    if (!isset($empty_message)) {
      if (update("messages", ["messageContent"], "messageId=?", [$message_edit, $_POST["messageId"]]))
        redirect_to("messages");
      else
        $error_operation = true;
    }
  }



  //main page of messages will called if not query is set 
  if (!isset($_GET["do"])) {
    $user_messages = select("messages", ["messageId", "messageContent"], "userId=?", [$_SESSION["userId"]]);
    require_once $templetes . $message_templete;
  }

  //create message  
  elseif ($_GET["do"] == "create") {
    require_once $templetes . $create_message_tempelete;
  }




  //edit message 
  elseif ($_GET["do"] == "edit") {
    //check if this message for authorized user  
    $user_created_message_id = select("messages", ["userId"], "messageId=?", [$_GET["messageId"]])[0]["userId"];
    if ($user_created_message_id == $_SESSION["userId"]) {
      $message_for_editing = select("messages", ["messageContent"], "messageId=?", [$_GET["messageId"]])[0]["messageContent"];
      require_once $templetes . $edit_message_tempelete;
    } else
      //this means user is not authorized 
      redirect_to("index");
  }





  //delete message 
  elseif ($_GET["do"] == "delete") {
    //check if this message for authorized user  
    $user_created_message_id = select("messages", ["userId"], "messageId=?", [$_GET["messageId"]])[0]["userId"];
    if ($user_created_message_id == $_SESSION["userId"]) {

      $done =  delete("messages", "messageId=?", [$_GET["messageId"]]);
      echo $done;
      if ($done) {
        redirect_to("messages");
        exit;
      } else
        $error_operation = true;
    } else
      //this means user is not authorized 
      redirect_to("index");
  }


  require_once $shared_files . $footer;
} else {
  //if user not signed in redirct him/her to login page 
  redirect_to("login");
}