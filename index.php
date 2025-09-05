<?php

$url = $_GET['url'] ?? 'home';

switch($url) {
    case 'contact':
        require './pages/contact.php';
        break;

    case 'about':
        require './pages/about.php';
        break;
    case 'post':
        require './pages/post.php';
        break;
    case 'messages':
        require './action/messages.php';
        break;
    case 'login':
        require 'auth/login.php';
        break;
    case 'register':
        require 'auth/register.php';
        break;
   

    default:
        require './pages/home.php';
}
