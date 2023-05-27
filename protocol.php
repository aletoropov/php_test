<?php

require "common.php";

use classes\Protocol;
use classes\Template;

$protocol = new Protocol();
$view = new Template();

$table = $view->render('table', ['protocols' => $protocol->getAll()]);
$layout = $view->render('layout', ['content' => $table, 'title' => 'Просмотр таблицы']);

echo $layout;