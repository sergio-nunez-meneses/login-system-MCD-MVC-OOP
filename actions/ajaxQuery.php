<?php
chdir('..');
require('include/requirements.php');

MainController::dispatch_query($_POST['query'], $_POST);
