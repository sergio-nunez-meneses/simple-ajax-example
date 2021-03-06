<?php
spl_autoload_register('class_autoloader');

function class_autoloader($class_name)
{
  $path = $parent_folder = '';

  if (substr($class_name, -5) === 'Model') {
    $parent_folder = 'models';
  } elseif (substr($class_name, -4) === 'View') {
    $parent_folder = 'views';
  } elseif (substr($class_name, -10) === 'Controller') {
    $parent_folder = 'controllers';
  }

  $path = getcwd() . "/classes/$parent_folder/$class_name.php";

  require_once($path);
}
