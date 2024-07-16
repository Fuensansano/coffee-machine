<?php declare(strict_types=1);

namespace Kata;

use Kata\vendor\DrinkMaker;

class CoffeeMachine
{
    private DrinkMaker $drinkMaker;

    public function __construct(DrinkMaker $drinkMaker)
    {
        $this->drinkMaker = $drinkMaker;
    }

    public function prepare(Order $order): void
    {
        $this->drinkMaker->prepare("H::");
    }
}
