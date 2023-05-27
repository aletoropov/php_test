<?php

require "common.php";

use classes\Protocol;
use classes\Template;

$protocol = new Protocol();
$view = new Template();

$index = $view->render('index');
$layout = $view->render('layout', ['content' => $index, 'title' => 'Тестовое задание']);

echo $layout;
