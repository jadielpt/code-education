<?php
require_once __DIR__ . '/../bootstrap.php';

$app->mount('/', include_once __DIR__ . '/../src/APIsSilex/Cliente/Controllers/cliente.php');

$app->run();