<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('login', 'get', 'login');
Router::url('register', 'get', 'register');
Router::url('index', 'get', 'index');
Router::url('logout', 'get', 'logout');

# POST
Router::url('login', 'get', 'login');
Router::url('register', 'get', 'register');
Router::url('contacts/add', 'post', 'ContactController::saveAdd');
Router::url('contacts/edit', 'post', 'ContactController::saveEdit');

new Router();