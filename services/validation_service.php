<?php

function registerValidate() {
    $result = [
        'success' => false,
        'errors' => []
    ];

    $email = $_POST['useremail'];
    $pass = $_POST['pass'];
    $confirm = $_POST['pass_confirm'];

    if(!$email || !$pass || !$confirm)
        $result['errors'][] = 'All fields are required!';

    if($pass !== $confirm)
        $result['errors'][] = 'Failed confirm password!';

    if(!$result['errors'])
        $result['success'] = true;
   
    return $result;
}

function loginValidate() {
    $result = [
        'success' => false,
        'errors' => []
    ];

    $email = $_POST['useremail'];
    $pass = $_POST['pass'];

    if(!$email || !$pass)
        $result['errors'][] = 'All fields are required!';

    if(!$result['errors'])
        $result['success'] = true;
   
    return $result;
}
