<?php

namespace App\Services;

use App\Models\Product;

class Checkout
{
    private array $items = [];
    private array $promotionalRules;

    public function __construct(array $promotionalRules)
    {
        $this->promotionalRules = $promotionalRules;
    }

    public function scan(Product $item): void
    {
        $this->items[] = $item;
    }

    public function total(): float
    {
        $total = array_reduce($this->items, fn($sum, $item) => $sum + $item->getPrice(), 0.0);
        foreach ($this->promotionalRules as $rule) {
            $discount = $rule->apply($this->items, $total);
            $total -= $discount;
        }
        return round($total, 2);
    }
}
