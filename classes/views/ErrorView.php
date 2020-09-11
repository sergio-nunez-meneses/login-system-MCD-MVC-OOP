<?php

class ErrorView
{

  public static function display($error_msg)
  {
    $response['error'] = $error_msg;
    return $response;
  }
}
