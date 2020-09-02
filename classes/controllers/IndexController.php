<?php

class IndexController
{

  public static function main_folder()
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['signout']))
    {
      SignController::sign_out();
    }
    require('views/indexView.php');
  }
}
