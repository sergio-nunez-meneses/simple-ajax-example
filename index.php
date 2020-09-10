<?php
require_once('include/class_autoloader.php');
include('include/header.php');

$run_db = new RunDBModel();
RecoverPassController::get_view();

include('include/footer.php');
