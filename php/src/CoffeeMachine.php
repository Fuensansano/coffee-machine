<?php declare(strict_types=1);

namespace Kata;

use Kata\vendor\DrinkMaker;

final class CoffeeMachine
{
    private DrinkMaker $drinkMaker;

    public function __construct(DrinkMaker $drinkMaker)
    {
        $this->drinkMaker = $drinkMaker;
    }

    public function prepare(Order $order): void
    {
        if (($order->drink === Drink::Coffee)) {
            $this->drinkMaker->prepare("C::");
            return;
        }
        $this->drinkMaker->prepare("H::");
    }
}
