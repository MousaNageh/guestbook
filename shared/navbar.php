<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">GuEsT<span class="text-success">B</span>OoK</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item <?php echo  isset($index_page_active) ?  'active'  : '' ?>">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item <?php echo  isset($messages_page_active) ?  'active'  : '' ?>">
          <a class=" nav-link" href="messages.php">myMessages</a>
        </li>
        <li class="nav-item <?php echo  isset($all_messages_page_active) ?  'active'  : '' ?> ">
          <a class=" nav-link" href="allmessages.php">allMessages</a>
        </li>
        <?php if (!isset($_SESSION["email"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">register</a>
        </li>
        <?php } ?>
        <?php if (isset($_SESSION["email"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>