<?php

namespace App\Rules;

use App\Interfaces\PromotionalRuleInterface;

class DiscountOver30 implements PromotionalRuleInterface
{
    public function apply(array $items, float $total): float
    {
        if ($total > 30) {
            return $total * 0.10;
        }
        return 0;
    }
}
