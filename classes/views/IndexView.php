<?php

class IndexView
{

  public static function display($success_msg)
  {
    if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] === TRUE))
    {
      ob_start();
      ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form id="sign_out_form" method="POST" onsubmit="submitForm(this, signOutResponse); return false;">
            <button class="btn btn-lg bg-dark text-white" type="submit" name="sign-out">Logout</button>
          </form>
        </li>
      </ul>
      <?php
      $response['navbar'] = ob_get_contents();
      ob_clean();

      ob_start();
      ?>
      <div class="border p-3 text-center">
        <div class="bg-warning text-white">
          <p class="p-1 lead"><?php echo $success_msg; ?></p>
        </div>
        <div>
          <h1>Welcome!</h1>
          <p class="lead">Username:
            <span class="font-italic text-secondary"><?php echo $_SESSION['user']; ?></span>
          </p>
          <p class="lead">Folder name:
            <span class="font-italic text-secondary"><?php echo $_SESSION['folder']; ?></span>
          </p>
          <p class="lead">Status:
            <span class="font-italic text-secondary">connected</span>
          </p>
        </div>
      </div>
      <?php
      $response['html'] = ob_get_contents();
      ob_clean();
      return $response;
    }
  }
}
