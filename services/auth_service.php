<?php

function register($email, $pass) {
    $users = json_decode(file_get_contents(DB_USERS), true);

    if(in_array($email, array_column($users, 'email'))) 
        return false; 

    $user = [
        'email' => $email,
        'pass' => md5($pass),
    ];

    $users[] = $user;

    file_put_contents(DB_USERS, json_encode($users));

    return true;
}

function login($email, $pass) {
    $users = json_decode(file_get_contents(DB_USERS), true);

    if(!in_array($email, array_column($users, 'email'))){
        return false; 
    }

    $user = $users[array_search($email, array_column($users, 'email'))];

    return $user['pass'] === md5($pass);
}

function isLogin() {
    return isset($_SESSION['login']);
}

function getUrl() {
    $url = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://';
    $url = $url . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    return $url;
}