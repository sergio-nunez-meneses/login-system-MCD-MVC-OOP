<?php

class IndexController
{

  public static function main_folder($success_msg)
  {
    if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['signout']))
    {
      SignController::sign_out();
    }
    return IndexView::display($success_msg);
  }
}
