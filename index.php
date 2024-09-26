<?php

require_once  __DIR__ . '/vendor/autoload.php';

if (array_key_exists('action',$_GET) && array_key_exists('data',$_POST)) {
    // Сортировка
    api($_GET['action'], $_POST['data']);

    die;
}

run_migrations();
run_seeder();

require_once __DIR__ . '/src/views/index.php';