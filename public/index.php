<?php

require __DIR__ . '/../vendor/autoload.php';

use belajar\php\Connection\Connection;
use belajar\php\Routes\Router;
use belajar\php\App\Controller\Controller;

Connection::getConnection('dev');


Router::add('GET', '/', Controller::class , 'index');

Router::add('GET', '/adduser', Controller::class , 'show');
Router::add('POST', '/adduser', Controller::class, 'create');


Router::add('GET', '/update/{id}', Controller::class , 'update');
Router::add('POST', '/update/{id}', Controller::class, 'edit');

Router::add('POST', '/destroy/{id}', Controller::class, 'destroy');


Router::run();


