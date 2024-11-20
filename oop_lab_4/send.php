<?php

require_once('Validator.php');

$validator = new Validator();

$validator->validate([
    'name' => 'required|min:3|max:255',
    'email' => 'required|email',
    'phone' => 'required|min:11|max:11|phone',
]);
if ($validator->fails()) {
    var_dump($validator->errors());
}

if ($validator->passes()) {
    echo 'Form submitted successfully!';
}
