<?php

namespace App\DTO;

class ProductDTO
{
    public string $name;
    public float $price;
    public string $type;

    public function __construct(string $name, float $price, string $type)
    {
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }
}
