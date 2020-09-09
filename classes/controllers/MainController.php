<?php

class MainController
{

  public static function execute($query, $inputs = false)
  {
    if
    ($query === 'init')
    {
      //
    }
    elseif ($query === 'sign_in_form')
    {
      $response = SignController::sign_in($inputs);
    }
    elseif ($query === 'sign_up_form')
    {
      $response = SignController::sign_up($inputs);
    }
    else
    {
      $response = SignController::sign_form();
    }

    if (empty($response) === FALSE)
    {
      echo $response;
    }
  }
}
