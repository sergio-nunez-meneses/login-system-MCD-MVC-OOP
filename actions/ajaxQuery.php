<?php
chdir('..');
require_once('include/auto_class_loader.php');

MainController::query_dispatcher($_POST['query'], $_POST);
