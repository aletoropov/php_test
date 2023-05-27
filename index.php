<?php

require "config.php";

//TODO: сделать автозагрузку через Composer
require "classes/Database.php";
require "classes/Protocol.php";

use classes\Protocol;

$protocol = new Protocol();

var_dump($protocol->getAll());