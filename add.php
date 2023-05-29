<?php

require "common.php";

use classes\Protocol;
use classes\Template;

$protocol = new Protocol();
$view = new Template();
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number  = (int)    filter_input(INPUT_POST, 'number');
    $date    = (string) filter_input(INPUT_POST, 'date');
    $person  = (string) filter_input(INPUT_POST, 'person');
    $sign    = (string) filter_input(INPUT_POST, 'sign');

    $result = $protocol->addProtocol($number, $date, $person, $sign);

    if (!is_array($result)) {
        header("Location: index.php");
        exit();
    }
}

$form = $view->render('addform', ['result' => $result]);

$layout = $view->render('layout', ['content' => $form, 'title' => 'Добавить протокол']);

echo $layout;
