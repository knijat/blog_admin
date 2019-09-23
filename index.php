<?php

//app directions

define('root_dir',__DIR__.'/');
define('cont_dir',root_dir.'/controller/');
define('mod_dir',root_dir.'/model/');
define('view_dir',root_dir.'/view/');

//all files are required
require(mod_dir.'model.php');
require(root_dir.'/vendor/autoload.php');

require (cont_dir.'controller.php');


