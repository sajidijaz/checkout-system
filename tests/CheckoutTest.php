<?php

use App\Models\Product;
use App\Rules\DiscountOver30;
use App\Rules\DiscountPizza;
use App\Services\Checkout;
use PHPUnit\Framework\TestCase;


class CheckoutTest extends TestCase
{
    public function testCheckoutWithoutPromotions()
    {
        $checkout = new Checkout([]);
        $checkout->scan(new Product('001', 'Curry Sauce', 1.95));
        $checkout->scan(new Product('002', 'Pizza', 5.99));
        $checkout->scan(new Product('003', 'Men’s T-Shirt', 25.00));

        $this->assertEquals(32.94, $checkout->total());
    }

    public function testCheckoutWithDiscountOver30()
    {
        $checkout = new Checkout([new DiscountOver30()]);
        $checkout->scan(new Product('001', 'Curry Sauce', 1.95));
        $checkout->scan(new Product('002', 'Pizza', 5.99));
        $checkout->scan(new Product('003', 'Men’s T-Shirt', 25.00));

        $this->assertEquals(29.65, $checkout->total());
    }

    public function testCheckoutWithDiscountPizza()
    {
        $checkout = new Checkout([new DiscountPizza()]);
        $checkout->scan(new Product('002', 'Pizza', 5.99));
        $checkout->scan(new Product('001', 'Curry Sauce', 1.95));
        $checkout->scan(new Product('002', 'Pizza', 5.99));

        $this->assertEquals(9.93, $checkout->total());
    }

    public function testCheckoutWithBothDiscounts()
    {
        $checkout = new Checkout([new DiscountPizza(), new DiscountOver30()]);
        $checkout->scan(new Product('002', 'Pizza', 5.99));
        $checkout->scan(new Product('001', 'Curry Sauce', 1.95));
        $checkout->scan(new Product('002', 'Pizza', 5.99));
        $checkout->scan(new Product('003', 'Men’s T-Shirt', 25.00));

        $this->assertEquals(31.44, $checkout->total());
    }
}
