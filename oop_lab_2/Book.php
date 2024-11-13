<?php 

class Book extends Product {
    private $publishers = [];
    public $writer;
    public $color;
    public $supplier;

    public function choosePublisher() {
        return $this->publishers[0][rand(0, count($this->publishers[0]) - 1)];
    }

    public function setPublisher($publishers) {
        return $this->publishers[] = $publishers;
    }

    public function showAllPublishers() {
        return $this->publishers;
    }
}