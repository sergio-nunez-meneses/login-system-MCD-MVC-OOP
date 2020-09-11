<?php

class SignView
{

  public static function display()
  {
    ob_start();
    ?>
    <div class="border p-3 bg-light text-center">
      <div class="bg-danger text-white">
        <p id="ajaxResponse" class="hidden alert alert-danger lead rounded"></p>
      </div>
      <div class="pt-1 pb-3 px-3">
        <p class="lead">Current connected user <span class="font-italic text-secondary">(just for debugging)</span>:
          <?php
          if (isset($_SESSION['user']) === TRUE) {
            echo $_SESSION['user'];
          } else {
            echo 'No user connected';
          }
          ?>
        </p>
      </div>
      <div class="pt-0 pb-3 px-3">
        <button id="signTab" class="btn btn-md bg-primary text-white" type="button">Show Sign Up</button>
      </div>
      <!-- SIGN IN -->
      <form id="sign_in_form" method="POST" enctype="multipart/form-data" onsubmit="submitForm(this, signInResponse); return false;">
        <div class="form-group">
          <input class="form-control" type="text" name="username" placeholder="username" required>
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="password" required>
        </div>
        <div class="form-group">
          <button class="btn btn-md bg-dark text-white" type="submit" name="sign-in">Submit</button>
        </div>
      </form>
      <!-- SIGN UP -->
      <form id="sign_up_form" class="hidden" method="POST" enctype="multipart/form-data" onsubmit="submitForm(this, signUpResponse); return false;">
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
          <button class="btn btn-md bg-dark text-white" type="button" name="sign-up">Submit</button>
        </div>
      </form>
    </div>
    <?php
    $response['html'] = ob_get_contents();
    ob_clean();
    return $response;
  }
}
