<?php
chdir('..');
require('include/requirements.php');

MainController::execute($_POST['query'], $_POST);
