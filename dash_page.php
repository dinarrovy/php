<?php
var_dump ($_SERVER['REQUEST_URI']);

url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case '/prak/login';
    case '/prak/register';
    default :
        echo'<h1>Homepage<h1>';
}
