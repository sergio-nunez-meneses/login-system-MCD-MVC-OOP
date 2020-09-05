<?php

class MainController
{

  public static function execute($query, $inputs = false)
  {
    if ($query === 'check_sign_in')
    {
      $response = SignController::sign_in();
    }

    if (empty($response) === FALSE)
    {
      echo $response;
    }
  }
}
