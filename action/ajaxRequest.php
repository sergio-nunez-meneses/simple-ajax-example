<?php
chdir('..');
require('include/class_autoloader.php');

// perform SQL query
$recovered_pass = (new RecoverPassModel())->recover_pass($_POST['user-mail']);

// send query result as a ajax response back to JS
echo "Your password is: $recovered_pass";
