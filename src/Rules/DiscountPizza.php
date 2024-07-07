<?php

namespace App\Rules;

use App\Interfaces\PromotionalRuleInterface;

class DiscountPizza implements PromotionalRuleInterface
{
    public function apply(array $items, float $total): float
    {
        $pizzaCount = count(array_filter($items, fn($item) => $item->getCode() === '002'));
        if ($pizzaCount >= 2) {
            return $pizzaCount * 2.00;
        }
        return 0;
    }
}
