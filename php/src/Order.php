<?php

namespace Kata;

final readonly class Order
{
    public Drink $drink;

    public function __construct(Drink $drink)
    {
        $this->drink = $drink;
    }
}
