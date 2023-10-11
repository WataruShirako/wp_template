<?php

// .envファイル読み込みをサポート
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(get_template_directory());
$dotenv->load();
