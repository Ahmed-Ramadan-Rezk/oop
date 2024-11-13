<?php

require_once('Session.php');
require_once('Validator.php');
Session::init();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    foreach ($_POST as $key => $value) {
        $$key = Validator::filter($value);
    }

    $errors = [];

    if (Validator::required($email)) {
        $errors['email'] = 'The email is required';
    } elseif (!Validator::email($email)) {
        $errors['email'] = 'The email is not valid!';
    }

    if (Validator::less($password, 8)) {
        $errors['password'] = 'The password is short, try another long one';
    }

    if (empty($errors)) {
        Session::set('success', 'Logged in successfully');
    } else {
        Session::set('email', $errors['email']);
        Session::set('password', $errors['password']);
    }

    header('location: index.php');
    exit();
} else {
    header('location: index.php');
    exit();
}
