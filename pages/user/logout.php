<?php 
require_once '../../db/config.php';
require_once ROOT_PATH.'core/functions.php';

session_start();

session_destroy();

redirect(URL.'index.php');