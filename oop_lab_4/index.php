<?php

require_once('Magic.php');


$obj = new Magic;

// Calling object method 'runTest' with parameters 'in object context'
$obj->runTest('in object context', 'other argument');
echo '<br>';
echo '<br>';

// Calling static method 'runTest' with parameters 'in static context'
Magic::runTest('in static context', 'other argument');
echo '<br>';
echo '<br>';

// Getting 'property'
echo $obj->property;
echo '<br>';
echo '<br>';

// Setting 'property' to 'test'
$obj->property = 'test';
echo '<br>';
echo '<br>';

// Invoking the object as a function
$obj(5);
var_dump(is_callable($obj));
echo '<br>';
echo '<br>';

// toString method
echo $obj;
echo '<br>';
echo '<br>';

// Cloning the object
$obj2 = clone $obj;
var_dump($obj2);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form class="mt-5" action="oop_lab_4/send.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>