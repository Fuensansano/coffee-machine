<?php declare(strict_types=1);

namespace KataTests;

use Kata\CoffeeMachine;
use Kata\Drink;
use Kata\Order;
use Kata\vendor\DrinkMaker;
use PHPUnit\Framework\TestCase;

class CoffeeMachineTest extends TestCase
{
    /** @test */
    public function given_a_chocolate_order_then_the_machine_prepare_the_order(): void
    {
        $drinkMaker = self::createMock(DrinkMaker::class);
        $order = new Order(Drink::Chocolate);

        $coffeeMachine = new CoffeeMachine($drinkMaker);

        $drinkMaker->expects(self::once())->method('prepare')->with("H::");
        $coffeeMachine->prepare($order);
    }

    /** @test */
    public function given_a_coffee_order_then_the_machine_prepare_the_order(): void
    {
        $drinkMaker = self::createMock(DrinkMaker::class);
        $order = new Order(Drink::Coffee);

        $coffeeMachine = new CoffeeMachine($drinkMaker);

        $drinkMaker->expects(self::once())->method('prepare')->with("C::");
        $coffeeMachine->prepare($order);
    }
}
