<?php


class  BabyCar extends Product
{
    public $age;
    public $weight;
    private $materials = [];
    private $specialTax = 11;

    public function displayMaterials()
    {
        return $this->materials[0];
    }

    public function setMaterial($material)
    {
        return $this->materials[] = $material;
    }

    public function getFinalPrice()
    {
        return $this->price + ($this->specialTax / 100) * $this->price;
    }
}
