<?php

namespace App\Interfaces;

interface PromotionalRuleInterface
{
    public function apply(array $items, float $total): float;
}
