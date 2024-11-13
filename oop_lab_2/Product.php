<?php

class Product {
    public $name;
    public $price;
    public $description;
    public $image;

    public function uploadImage($image) {
       return $this->image = $image;
    }

    public function calcPrice() {
        return $this->price;
    }
}