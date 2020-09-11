<?php

class IndexController
{

  public static function main_folder($success_msg)
  {
    return IndexView::display($success_msg);
  }
}
