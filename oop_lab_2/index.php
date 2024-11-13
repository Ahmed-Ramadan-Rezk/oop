<?php 
define('IMAGE_PATH', 'http://oop.test/oop_lab_2/images/');
require_once('Product.php');
require_once('Book.php');
require_once('BabyCar.php');


$book1 = new Book();
$book1->name = 'Harry Potter';
$book1->price = 2000;
$book1->description = 'Harry Potter is a book that was written by J.K. Rowling.';
$book1->uploadImage(IMAGE_PATH . 'harry-potter.webp');
$book1->setPublisher(['Penguin Random House','HarperCollins', 'Simon & Schuster']);
$book1->writer = 'J.K. Rowling';
$book1->color = 'Blue';
$book1->supplier = 'Amazon';

$book2 = new Book();
$book2->name = 'The Lord of the Rings';
$book2->price = 2500;
$book2->description = 'The Lord of the Rings is a book that was written by J.R.R. Tolkien.';
$book2->uploadImage(IMAGE_PATH . 'lord-of-the-rings.jpg');
$book2->setPublisher(['Penguin Random House','HarperCollins', 'Simon & Schuster']);
$book2->writer = 'J.R.R. Tolkien';
$book2->color = 'Red';
$book2->supplier = 'Amazon';

$babyCar1 = new BabyCar();
$babyCar1->name = 'Baby Car';
$babyCar1->price = 20000;
$babyCar1->description = 'Baby Car is a car that was made by Toyota.';
$babyCar1->uploadImage(IMAGE_PATH . 'baby-car.jpeg');
$babyCar1->age = '1-3 years old';
$babyCar1->weight = '10kg';
$babyCar1->setMaterial(['Plastic', 'Metal', 'Rubber']);
$babyCar1->getFinalPrice();

$babyCar2 = new BabyCar();
$babyCar2->name = 'Baby Car';
$babyCar2->price = 30000;
$babyCar2->description = 'Baby Car is a car that was made by Toyota.';
$babyCar2->uploadImage(IMAGE_PATH . 'baby-car.jpeg');
$babyCar2->age = '4-6 years old';
$babyCar2->weight = '15kg';
$babyCar2->setMaterial(['Plastic', 'Metal', 'Rubber']);
$babyCar2->getFinalPrice();

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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $book1->image ?>" alt="Card image cap" width="286" height="286">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book1->name ?></h5>
                        <p class="card-text"><?= $book1->description ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price: $<?= $book1->price ?></li>
                        <li class="list-group-item">Publisher: <?= $book1->choosePublisher() ?></li>
                        <li class="list-group-item">Writer: <?= $book1->writer ?></li>
                        <li class="list-group-item">Color: <?= $book1->color ?></li>
                        <li class="list-group-item">Supplier: <?= $book1->supplier ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $book2->image ?>" alt="Card image cap" width="286" height="286">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book2->name ?></h5>
                        <p class="card-text"><?= $book2->description ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price: $<?= $book2->price ?></li>
                        <li class="list-group-item">Publisher: <?= $book2->choosePublisher() ?></li>
                        <li class="list-group-item">Writer: <?= $book2->writer ?></li>
                        <li class="list-group-item">Color: <?= $book2->color ?></li>
                        <li class="list-group-item">Supplier: <?= $book2->supplier ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $babyCar1->image ?>" alt="Card image cap" width="286" height="286">
                    <div class="card-body">
                        <h5 class="card-title"><?= $babyCar1->name ?></h5>
                        <p class="card-text"><?= $babyCar1->description ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price: $<?= $babyCar1->getFinalPrice() ?></li>
                        <li class="list-group-item">Age: <?= $babyCar1->age ?></li>
                        <li class="list-group-item">Weight: <?= $babyCar1->weight ?></li>
                        <li class="list-group-item">Materials: <?= implode(',', $babyCar1->displayMaterials()[0]) ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $babyCar2->image ?>" alt="Card image cap" width="286" height="286">
                    <div class="card-body">
                        <h5 class="card-title"><?= $babyCar2->name ?></h5>
                        <p class="card-text"><?= $babyCar2->description ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price: $<?= $babyCar2->getFinalPrice() ?></li>
                        <li class="list-group-item">Age: <?= $babyCar2->age ?></li>
                        <li class="list-group-item">Weight: <?= $babyCar2->weight ?></li>
                        <li class="list-group-item">Materials: <?= implode(',', $babyCar2->displayMaterials()[0]) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>