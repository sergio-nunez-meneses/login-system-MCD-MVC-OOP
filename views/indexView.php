<?php
$page_title = 'Folder';
ob_start();
?>
<div class="border p-3 text-center">
  <div class="bg-danger text-white">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['success'])) {
      ?>
      <p><?php echo $_GET['success']; ?></p>
      <?php
    }
    ?>
  </div>
  <div>
    <h1>Welcome!</h1>
    <?php
    if (isset($_SESSION['user']) && isset($_SESSION['folder']) && isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === true)) {
      ?>
      <p class="lead">Username: <?php echo $_SESSION['user']; ?></p>
      <p class="lead">Folder name: <?php echo $_SESSION['folder']; ?></p>
      <p class="lead">Status: connected</p>
      <?php
    }
    ?>
  </div>
</div>
<?php
$page_content = ob_get_clean();
require('template.php');
