<?php
$page_title = 'Sign';
ob_start();
?>
<div class="border p-3 bg-light text-center">
  <div class="bg-danger text-white">
    <p id="ajaxResponse" class="hidden alert alert-danger lead rounded"></p>
    <?php
    // if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])) {
      ?>
      <!-- <p id="" class="alert alert-warning lead"><?php // echo $_GET['error']; ?></p> -->
      <?php
    // }
    ?>
  </div>
  <div class="pt-0 pb-3 px-3">
    <button id="signTab" class="btn btn-md bg-primary text-white" type="button">Show Sign Up</button>
  </div>
  <!-- SIGN IN -->
  <form id="signInForm" method="POST" enctype="multipart/form-data" onclick="ajaxQuery(request('check_sign_in', this));">
    <div class="form-group">
      <input class="form-control" type="text" name="username" placeholder="username" required>
    </div>
    <div class="form-group">
      <input class="form-control" type="password" name="password" placeholder="password" required>
    </div>
    <div class="form-group">
      <button class="btn btn-md bg-dark text-white" type="button" name="sign-in">Submit</button>
    </div>
  </form>
  <!-- SIGN UP -->
  <form id="signUpForm" class="hidden" action="/sign" method="POST">
    <div class="form-group">
      <input class="form-control" type="text" name="username" placeholder="username" required>
    </div>
    <div class="form-group">
      <input class="form-control" type="text" name="folder-name" placeholder="folder name" required>
    </div>
    <div class="form-group">
      <input class="form-control" type="password" name="password" placeholder="password" required>
    </div>
    <div class="form-group">
      <input class="form-control" type="password" name="confirm-password" placeholder="confirm password" required>
    </div>
    <div class="form-group">
      <button class="btn btn-md bg-dark text-white" type="submit" name="sign-up">Submit</button>
    </div>
  </form>
</div>
<?php
$page_content = ob_get_clean();
require('template.php');
?>
