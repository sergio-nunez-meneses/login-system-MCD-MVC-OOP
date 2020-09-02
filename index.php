<?php
session_start();
require('include/requirements.php');

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['page'])) {
  $page = explode('/', $_GET['page']);

  if ($page[0] === '') {
    SignController::sign_form();
  } elseif ($page[0] === 'folder') {
    IndexController::main_folder();
  } else {
    echo 'Error 404: page <em>' . $_GET['page'] . '</em> not found';
  }
} else {
  SignController::sign_form();
}
